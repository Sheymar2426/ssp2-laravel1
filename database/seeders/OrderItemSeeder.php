<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orderitems')->insert([
            [
                'OrderId' => 5,   // the actual existing OrderId
                'ProductId' => 1, // make sure this product exists
                'Quantity' => 1,
                'Price' => 25.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
