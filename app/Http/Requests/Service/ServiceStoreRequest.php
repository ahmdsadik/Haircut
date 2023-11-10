<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:services,name'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'integer', 'min:1'],
            'price' => ['required', 'integer'],
            'is_published' => ['nullable','bool'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
