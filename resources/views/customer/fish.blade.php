@extends('layouts.app')

@section('content')
@php
$categoryModel = new \App\Models\Category();
$subCategoryModel = new \App\Models\SubCategory();
$fish = $categoryModel->getCategoryByName('Fish');
$fishId = $fish ? $fish->CategoryId : null;
$subCategories = $fishId ? $subCategoryModel->getSubCategoriesByCategoryId($fishId) : [];
@endphp

<!-- Hero Section -->
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">FISH</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="bg-blue-900 text-white p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-2">Aquarium essentials for your fish</h2>
                <p class="text-gray-200">Get quality tanks, filters, and food to keep your fish thriving.</p>
            </div>
            <img src="{{ asset('images/products/a2.jpeg') }}" alt="Aquarium Fish" class="rounded-xl shadow-md">
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="flex justify-center gap-10 flex-wrap">
            @if(!empty($subCategories))
                @foreach($subCategories as $sub)
                    <a href="{{ url('products?category='.$fishId.'&subcategory='.$sub->SubCategoryId) }}" 
                       class="w-72 px-12 py-10 bg-blue-100 rounded-xl shadow hover:shadow-lg cursor-pointer text-lg font-semibold text-center">
                        {{ strtoupper($sub->SubCategoryName) }}
                    </a>
                @endforeach
            @else
                <p class="text-gray-600 w-full text-center">No subcategories found for Fish.</p>
            @endif
        </div>
    </div>
</section>

<!-- Deals Section -->
<section class="py-16 bg-gray-50 text-center">
    <h2 class="text-2xl font-bold text-blue-900 mb-10">Deals</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center max-w-7xl mx-auto">
        <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-8 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold">25% OFF ON AQUARIUM SETS</h3>
        </div>
        <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-8 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold">FREE FILTER WITH LARGE TANKS</h3>
        </div>
    </div>
</section>
@endsection
