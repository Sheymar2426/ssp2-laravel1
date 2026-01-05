<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Protected routes for authenticated users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Default dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Customer dashboard
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
         ->name('customer.dashboard');

    // Admin dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
         ->name('admin.dashboard');

    // Placeholder routes for admin nav buttons
    Route::get('/admin/orders', function(){ return 'Orders Page'; })
         ->name('admin.orders.index');
    Route::get('/admin/customers', function(){ return 'Customers Page'; })
         ->name('admin.customers.index');
    Route::get('/admin/products', function(){ return 'Products Page'; })
         ->name('admin.products.index');
    Route::get('/admin/categories', function(){ return 'Categories Page'; })
         ->name('admin.categories.index');
    Route::get('/admin/reports/sales', function(){ return 'Sales Reports Page'; })
         ->name('admin.reports.sales');
});
