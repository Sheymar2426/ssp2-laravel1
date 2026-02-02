<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PharmacyController;
use App\Http\Middleware\IsAdmin;

// Category pages
Route::get('/cats', [PageController::class, 'showCats'])->name('cats');
Route::get('/dogs', [PageController::class, 'showDogs'])->name('dogs');
Route::get('/birds', [PageController::class, 'showBirds'])->name('birds');
Route::get('/fish', [PageController::class, 'showFish'])->name('fish');

// Products filtered by category & subcategory
Route::get('/products', [ProductController::class,'showProductListing'])->name('products');



// ---------------- LEARNING PAGES ----------------
Route::view('/customer/animal-care', 'customer.animal-care')->name('customer.animal-care');
Route::view('/customer/training', 'customer.training')->name('customer.training');
Route::view('/customer/nutrition', 'customer.nutrition')->name('customer.nutrition');

Route::view('/customer/pharmacy', 'customer.pharmacy')->name('customer.pharmacy');

// ---------------- DEFAULT PAGE ----------------
Route::get('/', function () {
    return redirect()->route('login');
});

// ---------------- PUBLIC PAGES ----------------
Route::get('/about', [PageController::class,'showAbout'])->name('about');
Route::get('/products', [ProductController::class,'showProductListing'])->name('products');
Route::get('/product/{id}', [ProductController::class,'showProductDetail'])->name('product.detail');
Route::get('/subcategories/{categoryId}', [ProductController::class,'showSubCategories'])->name('subcategories');

// ---------------- CART & CHECKOUT ----------------
Route::get('/cart', [CartController::class,'showCart'])->name('cart');
Route::post('/cart/add', [CartController::class,'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class,'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout/confirm', [CartController::class,'confirmCheckout'])->name('checkout.confirm');

// ---------------- PROTECTED ROUTES ----------------
// shows that iam using jetsream //
Route::middleware(['auth', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Universal dashboard
    Route::get('/dashboard', function () {
        $user = auth()->user();
        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : view('customer.home');
    })->name('dashboard');

    // Customer dashboard
    Route::get('/customer/dashboard', function () {
        return view('customer.home');
    })->name('customer.dashboard');

    // ---------------- ADMIN ROUTES ----------------
 Route::prefix('admin')->middleware(['auth', 'verified', IsAdmin::class])->group(function() {

    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    Route::get('/orders', [AdminController::class,'showOrders'])->name('admin.orders');
    Route::get('/customers', [AdminController::class,'showCustomers'])->name('admin.customers');
    Route::get('/products', [AdminController::class,'showProducts'])->name('admin.products');
    Route::get('/categories', [AdminController::class,'showCategories'])->name('admin.categories');
    Route::get('/reports', [AdminController::class,'showReports'])->name('admin.reports');

    Route::get('products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('products/store', [AdminController::class, 'storeProduct'])->name('admin.products.store');

    Route::get('/products/edit/{ProductId}', [AdminController::class,'editProduct'])->name('admin.products.edit');
    Route::post('/admin/products/update/{ProductId}', [AdminController::class, 'updateProduct'])
    ->name('admin.products.update');

    Route::delete('/products/delete/{ProductId}', [AdminController::class,'deleteProduct'])->name('admin.products.delete');

});

Route::post('/checkout/confirm', [CartController::class,'confirmCheckout'])->name('checkout.confirm');

Route::get('/customer/pharmacy', [PharmacyController::class, 'index'])->name('customer.pharmacy');

// Admin
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/pharmacy/create', [PharmacyController::class, 'create'])->name('admin.pharmacy.create');
    Route::post('/admin/pharmacy/store', [PharmacyController::class, 'store'])->name('admin.pharmacy.store');
});

}); // <- THIS closes the 'auth' middleware group

// ---------------- TEST ROUTE ----------------
Route::get('/test-admin', function() {
    return "Middleware works!";
})->middleware(IsAdmin::class);

