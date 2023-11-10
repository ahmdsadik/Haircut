<?php

namespace Database\Seeders;

use App\Models\WorkingHour;
use Illuminate\Database\Seeder;

class WorkingHourSeeder extends Seeder
{
    public function run(): void
    {
        WorkingHour::factory()->count(7)->create();

        WorkingHour::inRandomOrder()->first()->update(
            [
                'from' => null,
                'to' => null,
            ]
        );
    }
}
