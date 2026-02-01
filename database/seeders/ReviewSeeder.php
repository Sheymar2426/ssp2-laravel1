<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'ProductId' => 1,
            'CustomerId' => 1,
            'Rating' => 5,
            'Comment' => 'Excellent product!'
        ]);

        Review::create([
            'ProductId' => 2,
            'CustomerId' => 1,
            'Rating' => 4,
            'Comment' => 'My cat loves it!'
        ]);
    }
}
