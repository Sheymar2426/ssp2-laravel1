<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        {
        // Dogs (CategoryId = 1)
        SubCategory::create(['SubCategoryName' => 'Food', 'CategoryId' => 1]);
        SubCategory::create(['SubCategoryName' => 'Toys', 'CategoryId' => 1]);
        SubCategory::create(['SubCategoryName' => 'Supplements', 'CategoryId' => 1]);

        // Cats (CategoryId = 2)
        SubCategory::create(['SubCategoryName' => 'Food', 'CategoryId' => 2]);
        SubCategory::create(['SubCategoryName' => 'Toys', 'CategoryId' => 2]);
        SubCategory::create(['SubCategoryName' => 'Supplements', 'CategoryId' => 2]);

        // Birds (CategoryId = 3)
        SubCategory::create(['SubCategoryName' => 'Food', 'CategoryId' => 5]);
        SubCategory::create(['SubCategoryName' => 'Cages', 'CategoryId' => 5]);

        // Fish (CategoryId = 4)
        SubCategory::create(['SubCategoryName' => 'Food', 'CategoryId' => 6]);
        SubCategory::create(['SubCategoryName' => 'Aquariums', 'CategoryId' => 6]);
    }
    }
}
