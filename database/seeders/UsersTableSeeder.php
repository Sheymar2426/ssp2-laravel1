<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Sheyma',
            'email' => 'sheymamari@gmail.com',
            'password' => bcrypt('password'), // change if needed
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // change if needed
            'role' => 'admin',
        ]);
    }
}
