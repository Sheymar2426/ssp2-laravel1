<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------------- CATEGORY PAGES ----------------
Route::view('/customer/cats', 'customer.cats')->name('customer.cats');
Route::view('/customer/dogs', 'customer.dogs')->name('customer.dogs');
Route::view('/customer/fish', 'customer.fish')->name('customer.fish');
Route::view('/customer/birds', 'customer.birds')->name('customer.birds');

// ---------------- LEARNING PAGES ----------------
Route::view('/customer/animal-care', 'customer.animal-care')->name('customer.animal-care');
Route::view('/customer/training', 'customer.training')->name('customer.training');
Route::view('/customer/nutrition', 'customer.nutrition')->name('customer.nutrition');
Route::view('/customer/behavior', 'customer.behavior')->name('customer.behavior');

// ---------------- DEFAULT PAGE ----------------
Route::get('/', [ProductController::class, 'showHomePage'])->name('home');

// ---------------- AUTH ROUTES ----------------
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

// ---------------- PUBLIC PAGES ----------------
Route::get('/about', [PageController::class,'showAbout'])->name('about');
Route::get('/cats', [PageController::class,'showCats'])->name('cats');
Route::get('/products', [ProductController::class,'showProductListing'])->name('products');
Route::get('/product/{id}', [ProductController::class,'showProductDetail'])->name('product.detail');
Route::get('/subcategories/{categoryId}', [ProductController::class,'showSubCategories'])->name('subcategories');

// ---------------- CART & CHECKOUT ----------------
Route::get('/cart', [CartController::class,'showCart'])->name('cart');
Route::post('/cart/add', [CartController::class,'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class,'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout/confirm', [CartController::class,'confirmCheckout'])->name('checkout.confirm');

// ---------------- PROTECTED ROUTES (JETSTREAM + AUTH) ----------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Default dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Customer dashboard
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
         ->name('customer.dashboard');

    // Admin dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
         ->name('admin.dashboard');

    // ---------------- ADMIN ROUTES ----------------
    Route::prefix('admin')->group(function() {
        Route::get('/orders', [AdminController::class,'showOrders'])->name('admin.orders.index');
        Route::get('/customers', [AdminController::class,'showCustomers'])->name('admin.customers.index');
        Route::get('/products', [AdminController::class,'showProducts'])->name('admin.products.index');
        Route::get('/categories', [AdminController::class,'showCategories'])->name('admin.categories.index');
        Route::get('/reports', [AdminController::class,'showReports'])->name('admin.reports');
    });
});
