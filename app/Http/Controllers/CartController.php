<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = session('cart', []);
        return view('customer.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $productId = $request->product_id;
        $cart = session('cart', []);
        $cart[$productId] = $cart[$productId] ?? [
            'id' => $productId,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 0,
            'image' => $request->image ?? 'images/no-image.png',
        ];
        $cart[$productId]['quantity'] += $request->quantity ?? 1;

        session(['cart' => $cart]);
        return redirect()->route('cart');
    }

    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->route('cart');
    }

    public function confirmCheckout(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) return redirect()->route('cart')->with('error','Cart is empty');

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        $order = Order::create([
            'CustId' => session('user_id'),
            'TotalAmount' => $total,
            'Status' => 'Pending',
            'PaymentId' => null
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'ProductId' => $item['id'],
                'Quantity' => $item['quantity'],
                'Price' => $item['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('home')->with('success','Order placed successfully');
    }
}
