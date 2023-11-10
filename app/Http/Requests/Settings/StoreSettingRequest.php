<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => ['required'],
            'title' => ['nullable'],
            'content' => ['nullable'],
            'image' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
