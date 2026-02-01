<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminCustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:customer,email',
            'password'=>'required|string|min:6',
        ]);

        $customer = Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone ?? null,
            'password'=>Hash::make($request->password),
        ]);

        return response()->json($customer,201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->only('name','email','phone'));
        if($request->password){
            $customer->password = Hash::make($request->password);
            $customer->save();
        }
        return response()->json($customer);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json(['message'=>'Deleted']);
    }
}
