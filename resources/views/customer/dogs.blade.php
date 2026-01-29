@extends('layouts.app')

@section('content')
@php
$categoryModel = new \App\Models\Category();
$subCategoryModel = new \App\Models\SubCategory();
$dog = $categoryModel->getCategoryByName('Dogs');
$dogId = $dog ? $dog->CategoryId : null;
$subCategories = $dogId ? $subCategoryModel->getSubCategoriesByCategoryId($dogId) : [];
@endphp

<!-- Hero Section -->
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-2">
        <div class="bg-blue-900 text-white rounded-xl shadow-md w-[600px] h-[350px] flex flex-col justify-center p-8">
            <h1 class="text-3xl font-bold mb-4">DOGS</h1>
            <h2 class="text-2xl font-bold mb-4">Everything your dog needs</h2>
            <p class="text-gray-200">Find premium products to keep your dogs happy, healthy, and active.</p>
        </div>
        <div class="flex-shrink-0">
            <img src="{{ asset('images/products/dg1.jpg') }}" alt="Happy Dog" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @if(!empty($subCategories))
                @foreach($subCategories as $sub)
                    <a href="{{ url('products?category='.$dogId.'&subcategory='.$sub->SubCategoryId) }}" 
                       class="p-6 bg-blue-100 rounded-xl shadow hover:shadow-lg block text-center">
                        {{ strtoupper($sub->SubCategoryName) }}
                    </a>
                @endforeach
            @else
                <p class="text-gray-600 col-span-full">No subcategories found for Dogs.</p>
            @endif
        </div>
    </div>
</section>
@endsection
