<?php

namespace App\Http\Requests\Stylist;

use Illuminate\Foundation\Http\FormRequest;

class StylistStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'address' => ['required'],
            'image' => ['nullable','image'],
            'specialization_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
