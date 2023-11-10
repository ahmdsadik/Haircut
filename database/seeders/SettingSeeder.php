<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'key' => 'logo',
            ],
            [
                'key' => 'favicon',
            ],
            [
                'key' => 'website_title',
                'title' => 'HairCut',
            ],
            [
                'key' => 'website-meta-description',
                'content' => 'LUXURY HAIRCUT AT AFFORDABLE PRICE. All Modern Haircuts, modern styles and good prices. We are the best in the city.',
            ],
            [
                'key' => 'website-meta-keywords',
                'content' => 'Haircut - Styles - Modern - New - Beard - Shave - Hair - Salon - Barber',
            ],
            [
                'key' => 'price-plan',
                'title' => 'Price & Plan',
                'content' => 'CHECK OUT OUR BARBER SERVICES AND PRICES',
            ],
            [
                'key' => 'our-barber',
                'title' => 'Our Barbers',
                'content' => 'MEET OUR BARBER',
            ],
            [
                'key' => 'working-hours',
                'title' => 'Working Hours',
                'content' => 'PROFESSIONAL BARBERS ARE WAITING FOR YOU',
            ],
            [
                'key' => 'services',
                'title' => 'Services',
                'content' => 'WHAT WE PROVIDE',
            ],
            [
                'key' => 'login-description',
                'content' => 'LUXURY HAIRCUT AT AFFORDABLE PRICE.',
            ],
            [
                'key' => 'address',
                'content' => '123 STREET, Cairo, Egypt',
            ],
            [
                'key' => 'phone',
                'content' => '+012 345 67890',
            ],
            [
                'key' => 'email',
                'content' => 'test@example.com',
            ],
        ];

        foreach ($data as $item) {
            $setting = \App\Models\Setting::create($item);

            if ($setting->key === 'logo') {
                $setting->addMediaFromUrl('https://via.placeholder.com/150')
                    ->toMediaCollection('logo');
            }

            if ($setting->key === 'favicon') {
                $setting->addMediaFromUrl('https://via.placeholder.com/150')
                    ->toMediaCollection('favicon');
            }

            if ($setting->key === 'working-hours') {
                $setting->addMediaFromUrl('https://via.placeholder.com/150')
                    ->toMediaCollection('working-hours');
            }

            if ($setting->key === 'price-plan') {
                $setting->addMediaFromUrl('https://via.placeholder.com/150')
                    ->toMediaCollection('price-plan');
            }



        }
    }
}
