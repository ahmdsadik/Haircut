<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class EditAppointment extends Component
{

    public Appointment $appointment;

    public $test = "cdsvds";

    public $services = [];
    public $stylists = [];

    public function mount($appointment)
    {
        $this->appointment = $appointment;

//        dd($this->appointment);
    }

    public function render()
    {
        return view('livewire.edit-appointment');
    }
}
