<?php

namespace App\Livewire\Forms;

use App\Models\Appointment;
use Livewire\Attributes\Rule;
use Livewire\Form;

class AppointmentForm extends Form
{
    #[Rule(['required'])]
    public $customer_name = '';

    #[Rule(['required'])]
    public $phone = '';

    #[Rule(['required', 'integer','exists:services,id'])]
    public $service_id = '';

    #[Rule(['required', 'integer','exists:stylists,id'])]
    public $stylist_id = '';

    #[Rule(['nullable', 'date'])]
    public $appointment_at = '';


    public function save()
    {
        $this->validate();

        $appointment = Appointment::create($this->all());
    }

    public function update(Appointment $appointment)
    {
        $this->validate();

        $appointment->update($this->all());
    }
}
