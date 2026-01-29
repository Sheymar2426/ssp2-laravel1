<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'Name' => $this->faker->word,
        'Description' => $this->faker->sentence,
        'Price' => $this->faker->randomFloat(2, 10, 500),
        'Stock' => $this->faker->numberBetween(1, 100),
        'CategoryId' => 1,
        'SubCategoryId' => 1,
        'Image' => 'images/products/sample.jpg',
    ];
}
}
