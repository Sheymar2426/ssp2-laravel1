<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function showHomePage()
    {
        $featuredProducts = Product::orderBy('ProductId', 'desc')->take(8)->get();
        $categories = Category::all();
        return view('customer.home', compact('featuredProducts', 'categories'));
    }

    public function showSubCategories($categoryId)
    {
        $subcategories = SubCategory::where('CategoryId', $categoryId)->get();
        $category = Category::find($categoryId);
        return view('customer.subcategories', compact('subcategories','category'));
    }

    public function showProductListing(Request $request)
    {
        $categoryId = $request->categoryId;
        $subcategoryId = $request->subcategoryId;
        $query = Product::query();

        if($categoryId) $query->where('CategoryId',$categoryId);
        if($subcategoryId) $query->where('SubCategoryId',$subcategoryId);

        $products = $query->get();
        return view('customer.products', compact('products'));
    }

    public function showProductDetail($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('CategoryId',$product->CategoryId)
            ->where('id','!=',$id)->take(4)->get();

        return view('customer.product_detail', compact('product','relatedProducts'));
    }
}
