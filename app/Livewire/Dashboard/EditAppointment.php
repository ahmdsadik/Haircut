<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\AppointmentForm;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Stylist;
use App\Models\WorkingHour;
use Carbon\Carbon;
use Livewire\Component;

class EditAppointment extends Component
{
    public Appointment $appointment;
    public AppointmentForm $form;


    public $date, $time;

    public $dates = [];

    public $times = [];

    public $services = [];
    public $stylists = [];

    public function mount(): void
    {

        $this->form->customer_name = $this->appointment->customer_name;

        $this->form->phone = $this->appointment->phone;

        $this->form->service_id = $this->appointment->service_id;

        $this->form->stylist_id = $this->appointment->stylist_id;

        $this->date = Carbon::CreateFromFormat('Y-m-d H:i:s', $this->appointment->appointment_at)->format('Y-m-d l');

        $this->time = Carbon::CreateFromFormat('Y-m-d H:i:s', $this->appointment->appointment_at)->format('h A');


        // Make a list of  date from now and a week later
        $dates = collect();

        // List of off days
        $offDays = (array)WorkingHour::offDays();

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
        $this->stylists = Service::find($this->form->service_id)?->stylists;
        $this->times = $this->makeTimes();
    }

    public function updatedDate(): void
    {
        $this->times = $this->makeTimes();
    }

    public function updatedServiceId(): void
    {
        $this->stylists = Service::find($this->service_id)?->stylists;
    }

    protected function makeTimes(): \Illuminate\Support\Collection
    {
        $stylistAppointments = Stylist::find($this->form->stylist_id)?->appointments;


        // Get working hours for the selected day
        $fromTo = WorkingHour::where('day', Carbon::CreateFromFormat('Y-m-d l', $this->date)->format('l'))->first();

        $times = collect();

        // Loop through 24 hours and eliminate off hours according to working hours of that day and booked hours
        for ($i = 0; $i < 24; $i++) {
            $time = Carbon::create(0, 0, 0, $i);
            foreach ($stylistAppointments as $appointment) {
                if (
                    $appointment->appointment_at->format('Y-m-d') == Carbon::CreateFromFormat('Y-m-d l', $this->date)->format('Y-m-d')
                    &&
                    $appointment->appointment_at->format('h:i A') == $time->format('h:i A')
                    &&
                    $appointment->appointment_at->format('h A') != $this->time
                ) {

                    continue 2;
                }
            }

            if (Carbon::createFromFormat('h A', $fromTo->from)->format('H') <= $time->format('H') && Carbon::createFromFormat('h A', $fromTo->to)->format('H') > $time->format('H')) {
                $times->push($time->format('h A'));
            }
        }

        return $times;
    }


    public function render()
    {
        return view('livewire.appointments.edit-appointment');
    }

    public function save()
    {
        $date = Carbon::CreateFromFormat('Y-m-d l', $this->date)->format('Y-m-d');
        $time = Carbon::createFromFormat('h A', $this->time)->format('H:00:00');

        $this->form->appointment_at = $date . ' ' . $time;
        $this->form->update($this->appointment);


        $this->redirect(route('dashboard.appointments.index'));
    }
}
