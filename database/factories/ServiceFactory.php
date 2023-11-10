<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'name' => 'ser-' . $this->faker->name(),
            'description' => $this->faker->text(),
            'duration' => $this->faker->time('i'),
            'price' => $this->faker->randomNumber(),
            'is_published' => $this->faker->boolean(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
