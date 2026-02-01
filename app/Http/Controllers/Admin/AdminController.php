<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function showProducts()
    {
        // Eager load only the necessary columns
        $products = Product::with([
            'category:CategoryId,CategoryName',
            'subcategory:SubCategoryId,SubCategoryName'
        ])->get([
            'ProductId','Name','Price','Stock','Image','CategoryId','SubCategoryId'
        ]);

        return view('admin.products', compact('products'));
    }

    // Show the create product form //
public function createProduct() {
    $categories = \App\Models\Category::all();
    $subcategories = \App\Models\SubCategory::all();

    return view('admin.create', compact('categories', 'subcategories'));
}

//  Store the product in the database
public function storeProduct(Request $request) {
    $request->validate([
        'Name' => 'required|string|max:255',
        'Price' => 'required|numeric',
        'Stock' => 'required|integer',
        'Image' => 'nullable|image|max:2048',
        'CategoryId' => 'required|exists:category,CategoryId',
        'SubCategoryId' => 'required|exists:subcategories,SubcategoryId',
    ]);

    $product = new \App\Models\Product();
    $product->Name = $request->Name;
    $product->Price = $request->Price;
    $product->Stock = $request->Stock;
    $product->CategoryId = $request->CategoryId;
    $product->SubCategoryId = $request->SubCategoryId;

    if($request->hasFile('Image')){
        $path = $request->file('Image')->store('products', 'public');
        $product->Image = $path;
    }

    $product->save();

    return redirect()->route('admin.products')->with('success', 'Product added successfully!');
}

public function showDashboard()
{
    return view('admin.dashboard');
}

}
