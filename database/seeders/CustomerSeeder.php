<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
    Customer::create([
            'Name' => 'Sheyma',
            'Email' => 'sheyma.unique@example.com', // new unique email
            'Phone' => '0771234567',
            'Address' => 'Colombo, Sri Lanka',
        ]);
    }
}
