<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Admin login
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_type' => 'admin',
                'user_id'   => $user->id,
                'user_email'=> $user->email,
                'admin_name'=> $user->name,
            ]);
            return redirect()->route('admin.dashboard');
        }

        // Customer login
        $customer = Customer::where('email', $request->email)->first();
        if ($customer && Hash::check($request->password, $customer->password)) {
            session([
                'user_type'     => 'customer',
                'user_id'       => $customer->id,
                'customer_name' => $customer->name,
            ]);
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegister()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session([
            'user_type'     => 'customer',
            'user_id'       => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return redirect()->route('home')->with('success', 'Account created successfully');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
