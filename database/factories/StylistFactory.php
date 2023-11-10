<?php

namespace Database\Factories;

use App\Models\Specialization;
use App\Models\Stylist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StylistFactory extends Factory
{
    protected $model = Stylist::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->word(),
            'specialization_id' => Specialization::inRandomOrder()->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
