<?php

namespace App\Http\Requests\WorkingHours;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkingHourRequest extends FormRequest
{
    public function rules(): array
    {
//        dd($this->workingHour);
        return [
            'day' => ['required','in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday'],
            'from' => ['nullable', 'before:to'],
            'to' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
