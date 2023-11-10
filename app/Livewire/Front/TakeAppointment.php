<?php

namespace App\Livewire\Front;

use App\Models\Service;
use App\Models\Stylist;
use App\Models\WorkingHour;
use Carbon\Carbon;
use Livewire\Component;

class TakeAppointment extends Component
{

    public string $customer_name, $phone;

    public $service_id, $stylist_id, $date, $time;

    public $dates = [];

    public $times = [];

    public $services = [];
    public $stylists = [];

    public function mount(): void
    {
        // Make a list of  date from now and a week later
        $dates = collect();

        // List of off days
        $offDays = WorkingHour::offDays();

        // Loop through 7 days and eliminate off days
        for ($i = 0; $i < 7; $i++) {
            $d = Carbon::now()->addDays($i);
            if (in_array($d->format('l'), $offDays)) {
                continue;
            }
            $dates->push(Carbon::now()->addDays($i)->format('Y-m-d l'));
        }
        $this->dates = $dates;

        $this->services = Service::all();
    }

    public function updatedDate(): void
    {
        $stylistAppointments = Stylist::find($this->stylist_id)?->appointments;

        // Get working hours for the selected day
        $fromTo = WorkingHour::where('day', Carbon::CreateFromFormat('Y-m-d l', $this->date)->format('l'))->first();

        $times = collect();

        // Loop through 24 hours and eliminate off hours according to working hours of that day and booked hours
        for ($i = 9; $i < 24; $i++) {
            $time = Carbon::create(0, 0, 0, $i);
            foreach ($stylistAppointments as $appointment) {
                if (
                    $appointment->appointment_at->format('Y-m-d') == Carbon::CreateFromFormat('Y-m-d l', $this->date)->format('Y-m-d')
                    &&
                    $appointment->appointment_at->format('h:i A') == $time->format('h:i A')
                ) {

                    continue 2;
                }
            }

            if (Carbon::createFromFormat('h A', $fromTo->from)->format('H') <= $time->format('H') && Carbon::createFromFormat('h A', $fromTo->to)->format('H') > $time->format('H')) {
                $times->push($time->format('h A'));
            }
        }
        $this->times = $times;
    }

    public function updatedServiceId(): void
    {
        $this->stylists = Service::find($this->service_id)?->stylists;
    }

    public function render()
    {
        return view('livewire.front.take-appointment');
    }

    public function save()
    {
        $this->validate(
            [
                'customer_name' => 'required',
                'phone' => 'required',
                'date' => 'required',
                'time' => 'required',
                'service_id' => 'required',
                'stylist_id' => 'required',
            ]
        );

        $this->date = Carbon::CreateFromFormat('Y-m-d l', $this->date)->format('Y-m-d');
        $this->time = Carbon::createFromFormat('h:i A', $this->time)->format('H:00:00');

        $appointment = new \App\Models\Appointment();
        $appointment->customer_name = $this->customer_name;
        $appointment->phone = $this->phone;
        $appointment->appointment_at = $this->date . ' ' . $this->time;
        $appointment->service_id = $this->service_id;
        $appointment->stylist_id = $this->stylist_id;
        $appointment->save();

        session()->flash('message', "Appointment for $this->customer_name successfully created.");

        $this->redirect(route('take-appointment'));
    }
}
