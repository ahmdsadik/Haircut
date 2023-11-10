<?php

namespace Database\Factories;

use App\Models\WorkingHour;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WorkingHourFactory extends Factory
{
    protected $model = WorkingHour::class;

    public function definition(): array
    {
        return [
            'day' => $this->faker->unique()->date('l'),
            'from' => '09 AM',
            'to' => '09 PM',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
