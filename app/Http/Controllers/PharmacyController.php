<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;  // ← Use your actual model

class PharmacyController extends Controller
{
    public function index()
    {
        // Fetch all pharmacy products
        $products = Pharmacy::all(); 

        return view('customer.pharmacy', compact('products'));
    }

    // For admin to create
    public function create()
    {
        return view('admin.pharmacy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Price' => 'required|numeric',
            'Stock' => 'required|integer',
            'Image' => 'nullable|image|max:2048',
        ]);

        $product = new Pharmacy();
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        $product->Price = $request->Price;
        $product->Stock = $request->Stock;

        if ($request->hasFile('Image')) {
            $path = $request->file('Image')->store('pharmacy', 'public');
            $product->Image = $path;
        }

        $product->save();

        return redirect()->route('admin.pharmacy.create')->with('success', 'Pharmacy product added!');
    }
}
