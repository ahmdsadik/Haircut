<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Stylist;
use Illuminate\Database\Seeder;

class StylistSeeder extends Seeder
{
    public function run(): void
    {
        Stylist::factory(10)
            ->create();

        $sylists = Stylist::all();

        foreach ($sylists as $sylist) {

            $ser = Service::inRandomOrder()->limit(random_int(1,4))->pluck('id');

            $sylist->services()->attach($ser);
        }
    }
}
