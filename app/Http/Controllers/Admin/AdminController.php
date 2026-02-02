<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
   public function showProducts()
{
    $products = Product::with([
        'category:CategoryId,CategoryName',
        'subcategory:SubCategoryId,SubCategoryName'
    ])
    ->select('ProductId','Name','Price','Stock','CategoryId','SubCategoryId')
    ->limit(20)   //  HARD LIMIT FOR TEST
    ->get();

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

public function showOrders()
{
    $orders = Order::with('items')
        ->orderBy('OrderDate', 'desc')
        ->paginate(20); // only 20 orders per page
    return view('admin.orders', compact('orders'));
}

public function editProduct($ProductId)
    {
        $product = Product::findOrFail($ProductId); // fetch the product
        return view('admin.products.edit', compact('product'));
    }

    // Optional: handle the form submission to update
public function updateProduct(Request $request, $ProductId)
{
    $product = Product::findOrFail($ProductId);

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'Image' => 'nullable|image|max:2048',
    ]);

    // Update fields
    $product->Name = $request->name;
    $product->Price = $request->price;
    $product->Stock = $request->stock;

    // Optional: update image if uploaded
    if ($request->hasFile('Image')) {
        $path = $request->file('Image')->store('products', 'public');
        $product->Image = $path;
    }

    $product->save(); // Save to database

    return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
}

public function deleteProduct($ProductId)
{
    $product = \App\Models\Product::findOrFail($ProductId);
    $product->delete(); // Delete from database

    return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
}

 public function showDashboard()
    {
        return view('admin.dashboard');
    }


}

