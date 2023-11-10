<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string'],
            'phone' => ['required'],
            'service_id' => ['required', 'exists:services,id'],
            'stylist_id' => ['required', 'exists:stylists,id'],
            'appointment_at' => ['required', 'date'],
//            'date' => ['nullable', 'date'],
//            'time' => ['nullable', 'date_format:H:i'],
            'status' => ['nullable', 'in:1,2,3,4'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
