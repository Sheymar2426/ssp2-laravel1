<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function showProductListing(Request $request)
    {
        $categoryId = $request->query('category');
        $subcategoryId = $request->query('subcategory');

        $query = Product::query();

        if($categoryId) {
            $query->where('CategoryId', $categoryId);
        }

        if($subcategoryId) {
            $query->where('SubCategoryId', $subcategoryId);
        }

        $products = $query->get();

        return view('customer.products', compact('products'));
    }

    public function showProductDetail($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('CategoryId', $product->CategoryId)
                                  ->where('ProductId', '!=', $id)
                                  ->take(4)
                                  ->get();

        return view('customer.product_detail', compact('product', 'relatedProducts'));
    }

    public function showSubCategories($categoryId)
    {
        $subCategories = SubCategory::where('CategoryId', $categoryId)->get();
        $category = Category::find($categoryId);

        return view('customer.subcategories', compact('subCategories','category'));
    }
}

