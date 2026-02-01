<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Helper function to get subcategory ID
        $getSubId = function($name, $catId) {
            $sub = Subcategory::firstWhere([
                'SubcategoryName' => $name,
                'CategoryId' => $catId
            ]);
            if (!$sub) {
                echo "Subcategory '$name' for category $catId not found!\n";
            }
            return $sub ? $sub->SubcategoryId : null;
        };

        $products = [
            // DOG FOOD
            ['Royal Canin Puppy','Nutrition specially made for growing puppies.',4500,40,1, $getSubId('Food',1),'images/royal_cannin_puppy.jpg'],
            ['Pedigree Adult','Balanced meal for adult dogs.',3800,35,1, $getSubId('Food',1),'images/pedigree_adult.jpg'],
            ['Purina Pro Plan','Premium protein-rich dog food.',5200,30,1, $getSubId('Food',1),'images/purina_pro_plan.jpg'],
            // DOG SUPPLEMENTS
            ['Vitamin Supplement','Daily vitamin support.',1800,25,1, $getSubId('Supplements',1),'images/vitamin_supplement.jpg'],
            ['Multivitamin Syrup','Boost immunity and health.',1500,20,1, $getSubId('Supplements',1),'images/multivitamin_syrup.jpg'],
            ['Probiotic Powder','Supports digestive health.',2000,18,1, $getSubId('Supplements',1),'images/probiotic_powder.jpg'],
            // DOG TOYS
            ['Squeaky Bone','Fun chew toy for dogs.',900,50,1, $getSubId('Toys',1),'images/squeaky_bone.jpg'],
            ['Frisbee Disc','Outdoor fetch toy.',750,45,1, $getSubId('Toys',1),'images/frisbee_disc.jpg'],
            ['Tennis Balls','Durable play balls.',600,60,1, $getSubId('Toys',1),'images/tennis_balls.jpg'],
            // CAT FOOD
            ['Royal Kitten','Food for growing kittens.',4200,30,2, $getSubId('Food',2),'images/royal_kitten.jpg'],
            ['Whiskas Dry','Tasty dry food for cats.',3500,28,2, $getSubId('Food',2),'images/whiskas_dry.jpg'],
            ['Drools Chicken & Rice','Nutritious cat meal.',3000,32,2, $getSubId('Food',2),'images/drools_chicken_rice.jpg'],
            // CAT SUPPLEMENTS
            ['Omega 3','Supports healthy skin & coat.',1700,22,2, $getSubId('Supplements',2),'images/omega3.jpg'],
            ['Skin Coat Oil','Shiny coat supplement.',1600,20,2, $getSubId('Supplements',2),'images/skin_coat_oil.jpg'],
            ['Cat Multivitamin Syrup','Complete vitamin support.',1500,18,2, $getSubId('Supplements',2),'images/multivitamin_syrup.jpg'],
            // CAT TOYS
            ['Feather Wand','Interactive cat toy.',800,40,2, $getSubId('Toys',2),'images/feather_wand.jpg'],
            ['Squeaky Bone (Cat)','Soft squeaky toy.',700,35,2, $getSubId('Toys',2),'images/squeaky_bone.jpg'],
            ['Feather Teaser','Fun chase toy.',850,30,2, $getSubId('Toys',2),'images/feather_wand.jpg'],
        ];

        foreach ($products as $p) {
            if ($p[5] !== null) { // only insert if subcategory exists
                DB::table('product')->updateOrInsert(
                    ['Name' => $p[0]], // avoid duplicates
                    [
                        'Description' => $p[1],
                        'Price' => $p[2],
                        'Stock' => $p[3],
                        'CategoryId' => $p[4],
                        'SubCategoryId' => $p[5],
                        'Image' => $p[6],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
