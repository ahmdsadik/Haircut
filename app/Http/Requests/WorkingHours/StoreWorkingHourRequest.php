<?php

namespace App\Http\Requests\WorkingHours;

use App\Enums\WorkingDays;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkingHourRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'day' => ['required', 'unique:working_hours,day', 'string', 'in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday'],
            'from' => ['nullable', 'date_format:h A' , ],
            'to' => [
                'nullable',
                'date_format:h A',
                function ($attribute, $value, $fail) {
//                    dd($value);
                    $from = $this->input('from');
                    if ($from && strtotime($from) >= strtotime($value)) {
                        $fail('The "to" time must be after the "from" time.');
                    }
                },
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
