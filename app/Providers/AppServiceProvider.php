<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Safe view composer for header
        View::composer('partials.header', function ($view) {
            try {
                // Fetch top 4 products
                $products = Product::take(4)->get();
            } catch (\Exception $e) {
                // In case something goes wrong, return empty collection
                $products = collect();
            }
            
            $view->with('products', $products);
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
