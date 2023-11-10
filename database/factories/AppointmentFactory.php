<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Stylist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        $service = Service::inRandomOrder()->first();
        $stylist = $service->stylists->first()->id?? 2;
//        dd($service->stylists->first()->name);

        return [
            'customer_name' => $this->faker->name('male'),
            'phone' => $this->faker->phoneNumber,
            'service_id' => $service->id,
            'stylist_id' => $stylist,
            'appointment_at' => Carbon::now()->addDays(rand(1, 7))->format('Y-m-d H:00:00'),
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
