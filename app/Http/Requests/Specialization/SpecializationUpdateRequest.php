<?php

namespace App\Http\Requests\Specialization;

use Illuminate\Foundation\Http\FormRequest;

class SpecializationUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:specializations,name,' . $this->specialization->id],
            'description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
