<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerAuthController;
use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\Admin\AdminProductController;
use App\Http\Controllers\Api\Admin\AdminCategoryController;
use App\Http\Controllers\Api\Admin\AdminOrderController;
use App\Http\Controllers\Api\Admin\AdminCustomerController;
use App\Http\Controllers\Api\Admin\AdminSubCategoryController;

//////////////////////////////
// CUSTOMER API ROUTES
//////////////////////////////

Route::prefix('customer')->group(function () {

    // Auth
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::post('/login', [CustomerAuthController::class, 'login']);

    // Public browsing
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/subcategories/{categoryId}', [SubCategoryController::class, 'byCategory']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/reviews/{productId}', [ReviewController::class, 'index']);

    // Protected customer actions
    Route::middleware('auth:sanctum')->group(function () {

        // Auth
        Route::post('/logout', [CustomerAuthController::class, 'logout']);
        Route::get('/profile', [CustomerAuthController::class, 'profile']);

        // Orders
        Route::post('/orders', [OrderController::class, 'store']);
        Route::get('/orders', [OrderController::class, 'customerOrders']);
        Route::get('/orders/{id}', [OrderController::class, 'show']);

        // Reviews
        Route::post('/reviews', [ReviewController::class, 'store']);
    });
});

//////////////////////////////
// ADMIN API ROUTES
//////////////////////////////

Route::prefix('admin')->group(function () {

    // Auth
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AdminAuthController::class, 'logout']);

        // Category CRUD
        Route::apiResource('categories', AdminCategoryController::class);

        // SubCategory CRUD
        Route::apiResource('subcategories', AdminSubCategoryController::class);

        // Product CRUD
        Route::apiResource('products', AdminProductController::class);

        // Orders
        Route::get('/orders', [AdminOrderController::class, 'index']);
        Route::get('/orders/{id}', [AdminOrderController::class, 'show']);
        Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
        Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy']);

        // Customers CRUD
        Route::apiResource('customers', AdminCustomerController::class)->except(['create','edit']);
    });
});
