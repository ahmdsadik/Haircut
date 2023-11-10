<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::create(
            [
                'name' => 'Admin',
                'user_name' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'password',
            ]
        );

//        User::factory(2)->create();
    }
}
