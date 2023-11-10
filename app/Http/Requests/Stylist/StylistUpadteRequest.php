<?php

namespace App\Http\Requests\Stylist;

use Illuminate\Foundation\Http\FormRequest;

class StylistUpadteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['nullable'],
            'email' => ['required', 'email', 'max:254'],
            'address' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
            'specialization_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
