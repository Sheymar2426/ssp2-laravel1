<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'OrderId' => 5,
            'PaymentMethod' => 'Credit Card',
            'Amount' => 31.98,
            'Status' => 'Completed'
        ]);
    }
}
