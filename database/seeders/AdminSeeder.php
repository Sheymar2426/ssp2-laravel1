<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'Name' => 'Admin User',
            'Email' => 'admin@example.com',
            'Password' => bcrypt('password'), // change if needed
            'Role' => 'admin',
        ]);
    }
}
