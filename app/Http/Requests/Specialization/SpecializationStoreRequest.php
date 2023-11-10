<?php

namespace App\Http\Requests\Specialization;

use Illuminate\Foundation\Http\FormRequest;

class SpecializationStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:specializations,name'],
            'description' => ['nullable','string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
