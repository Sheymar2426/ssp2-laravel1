<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('customer.checkout');
    }

    public function confirm(Request $request)
    {
        session()->forget('cart');
        return view('customer.checkout_success');
    }
}

