@extends('layouts.app')

@section('content')
@php
$categoryModel = new \App\Models\Category();
$subCategoryModel = new \App\Models\SubCategory();
$cat = $categoryModel->getCategoryByName('Cats');
$catId = $cat ? $cat->CategoryId : null;
$subCategories = $catId ? $subCategoryModel->getSubCategoriesByCategoryId($catId) : [];
@endphp

<!-- Hero Section -->
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-2">
        <div class="bg-blue-900 text-white rounded-xl shadow-md w-[600px] h-[350px] flex flex-col justify-center p-8">
            <h1 class="text-3xl font-bold mb-4">CATS</h1>
            <h2 class="text-2xl font-bold mb-4">Best place to shop for your pets</h2>
            <p class="text-gray-200">Discover the best products tailored for your cats at affordable prices.</p>
        </div>
        <div class="flex-shrink-0">
            <img src="{{ asset('images/products/cat2.jpg') }}" alt="Cool Cat" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="flex flex-wrap justify-center gap-10">
            @if(!empty($subCategories))
                @foreach($subCategories as $sub)
                    <a href="{{ url('products?category='.$catId.'&subcategory='.$sub->SubCategoryId) }}" 
                       class="w-60 px-10 py-8 bg-blue-100 rounded-xl shadow hover:shadow-lg cursor-pointer text-lg font-semibold text-center">
                        {{ strtoupper($sub->SubCategoryName) }}
                    </a>
                @endforeach
            @else
                <p class="text-gray-600 w-full text-center">No subcategories found for Cats.</p>
            @endif
        </div>
    </div>
</section>

<!-- Deals Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Deals</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center">
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-8 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold">25% OFF ON CAT FOODS</h3>
            </div>
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-8 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold">25% OFF ON CAT TOYS</h3>
            </div>
        </div>
    </div>
</section>
@endsection
