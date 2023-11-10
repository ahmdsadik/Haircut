<?php

namespace Database\Factories;

use App\Models\specialization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SpecializationFactory extends Factory
{
    protected $model = Specialization::class;

    public function definition(): array
    {
        return [
            'name' => 'Sp-' . $this->faker->unique()->jobTitle(),
            'description' => $this->faker->realText(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
