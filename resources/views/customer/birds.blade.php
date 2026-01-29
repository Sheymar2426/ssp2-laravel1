@extends('layouts.app')

@section('content')
@php
$categoryModel = new \App\Models\Category();
$subCategoryModel = new \App\Models\SubCategory();
$bird = $categoryModel->getCategoryByName('Birds');
$birdId = $bird ? $bird->CategoryId : null;
$birdCategories = ['FOODS','CAGES','TOYS','PERCHES','BIRD BATHS'];
$allSubCategories = $birdId ? $subCategoryModel->getSubCategoriesByCategoryId($birdId) : [];
$subCategoryMap = [];
foreach($allSubCategories as $sub) {
    $subCategoryMap[strtoupper($sub->SubCategoryName)] = $sub->SubCategoryId;
}
@endphp

<!-- Hero Section -->
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-6">
        <div class="bg-blue-900 text-white rounded-xl shadow-md w-[600px] h-[350px] flex flex-col justify-center p-8">
            <h1 class="text-3xl font-bold mb-4">BIRDS</h1>
            <h2 class="text-2xl font-bold mb-4">Care for your feathered friends</h2>
            <p class="text-gray-200">Explore cages, foods, and accessories perfect for birds of all kinds.</p>
        </div>
        <div class="flex-shrink-0">
            <img src="{{ asset('images/products/birds.jpg') }}" alt="Colorful Bird" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="flex justify-center gap-6 flex-wrap">
            @foreach($birdCategories as $catName)
                @php $subId = $subCategoryMap[$catName] ?? 0; @endphp
                <a href="{{ url('products?category='.$birdId.'&subcategory='.$subId) }}" 
                   class="p-8 bg-blue-100 rounded-xl shadow hover:shadow-lg cursor-pointer block text-center text-lg font-semibold">
                    {{ $catName }}
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Deals Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Deals</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center">
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-8 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold">20% OFF ON BIRD CAGES</h3>
            </div>
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-8 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold">15% OFF ON BIRD FOODS</h3>
            </div>
        </div>
    </div>
</section>
@endsection
