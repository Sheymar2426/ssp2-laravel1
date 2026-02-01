<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class PageController extends Controller
{
    public function showCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $subCategories = SubCategory::where('CategoryId', $categoryId)->get();

        return view('customer.category', compact('category', 'subCategories'));
    }

    // Optional shortcuts for convenience
    public function showCats() {
        return $this->showCategory(2); // Cats
    }

    public function showDogs() {
        return $this->showCategory(1); // Dogs
    }

    public function showBirds() {
        return $this->showCategory(3); // Birds
    }

    public function showFish() {
        return $this->showCategory(4); // Fish
    }

    public function showAbout()
    {
        return view('customer.about');
    }
}
