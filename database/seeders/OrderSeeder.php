<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'CustomerId' => 3,  // existing customer
                'TotalAmount' => 31.98,
                'Status' => 'Pending',
                'OrderDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
