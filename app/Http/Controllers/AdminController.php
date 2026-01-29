<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('user_type') !== 'admin') {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function showOrders(Request $request)
    {
        if ($request->has('update')) {
            Order::find($request->OrderId)->update($request->only(['TotalAmount','Status','PaymentId']));
        }
        if ($request->has('delete')) {
            Order::destroy($request->OrderId);
        }
        $orders = Order::orderBy('order_date', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function showCustomers(Request $request)
    {
        if ($request->has('create')) {
            Customer::create($request->only(['name','phone','email','password']));
        }
        if ($request->has('update')) {
            Customer::find($request->CustId)->update($request->only(['name','phone','email','password']));
        }
        if ($request->has('delete')) {
            Customer::destroy($request->CustId);
        }
        $customers = Customer::orderBy('id','desc')->get();
        return view('admin.customers', compact('customers'));
    }

    public function showProducts(Request $request)
    {
        if ($request->has('create')) {
            Product::create($request->all());
        }
        if ($request->has('update')) {
            Product::find($request->ProductId)->update($request->all());
        }
        if ($request->has('delete')) {
            Product::destroy($request->ProductId);
        }
        $products = Product::orderBy('id','desc')->get();
        return view('admin.products', compact('products'));
    }

    public function showCategories(Request $request)
    {
        if ($request->has('create')) {
            Category::create($request->only(['CategoryName']));
        }
        if ($request->has('update')) {
            Category::find($request->CategoryId)->update($request->only(['CategoryName']));
        }
        if ($request->has('delete')) {
            Category::destroy($request->CategoryId);
        }
        $categories = Category::orderBy('id','asc')->get();
        return view('admin.categories', compact('categories'));
    }

    public function showReports()
    {
        return view('admin.reports');
    }
}
