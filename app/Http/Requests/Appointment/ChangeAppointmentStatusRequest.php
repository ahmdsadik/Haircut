<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class ChangeAppointmentStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
