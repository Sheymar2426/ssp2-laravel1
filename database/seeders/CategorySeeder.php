<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::firstOrCreate(['CategoryId'=>1], ['CategoryName'=>'Dogs']);
        Category::firstOrCreate(['CategoryId'=>2], ['CategoryName'=>'Cats']);
        Category::firstOrCreate(['CategoryId'=>5], ['CategoryName'=>'Birds']);
        Category::firstOrCreate(['CategoryId'=>6], ['CategoryName'=>'Fishes']);
    }
}
