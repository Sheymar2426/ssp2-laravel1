<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:customer,Email',
        'password' => 'required|string|min:6',
    ]);

    $customer = Customer::create([
        'Name' => $request->name,
        'Email' => $request->email,
        'Password' => $request->password, // model will hash it
        'Phone' => $request->phone ?? null,
    ]);

    return response()->json([
        'message' => 'Customer registered successfully',
        'customer' => $customer
    ], 201);
}

    // Login
   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    $customer = Customer::where('Email', $request->email)->first();

    if (!$customer || !Hash::check($request->password, $customer->Password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return response()->json([
        'message' => 'Login successful',
        'customer' => $customer
    ]);
}
}