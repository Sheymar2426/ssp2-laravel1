<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'CustId'=>'required|integer',
            'TotalAmount'=>'required|numeric',
        ]);

        $order = Order::create($request->all());
        return response()->json($order,201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if(!$order){
            return response()->json(['message'=>'Order not found'],404);
        }
        return response()->json($order);
    }
}
