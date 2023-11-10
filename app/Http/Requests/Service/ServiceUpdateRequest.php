<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:services,name,' . $this->service->id],
            'description' => ['nullable'],
            'duration' => ['nullable'],
            'price' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'is_published' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
