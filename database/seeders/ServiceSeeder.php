<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Stylist;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::factory()
            ->count(10)
//            ->hasAttached(
//                Stylist::factory()->count(3),
//                ['created_at' => now(), 'updated_at' => now()]
//            )
            ->create();
    }
}
