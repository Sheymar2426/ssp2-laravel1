@extends('layouts.master')

@section('content')
<div class="pharmacy-page">

    <!-- Hero Banner -->
    <section class="relative bg-blue-100 py-10 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Pharmacy</h2>
        <p class="text-gray-600 mt-2">Find trusted medicines, supplements, and wellness essentials for your pets.</p>
    </section>

    <!-- Filter Section -->
    <section class="max-w-6xl mx-auto mt-6 flex justify-end px-4">
        <label for="filter" class="mr-2 text-gray-700 font-medium">Filter:</label>
        <select id="filter" name="filter" class="border border-gray-300 rounded px-3 py-2 text-gray-700">
            <option value="all">All Products</option>
            <option value="low_high">Price: Low to High</option>
            <option value="high_low">Price: High to Low</option>
            <option value="popular">Most Popular</option>
        </select>
    </section>

    <!-- Products Grid -->
    <section class="max-w-6xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
        @if($products->count() > 0)
            @foreach($products as $product)
                <div class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition flex flex-col">
                <img src="{{ asset($product->Image) }}" alt="{{ $product->Name }}" class="h-40 w-full object-cover rounded">
                <h3 class="mt-4 text-lg font-semibold text-gray-800">{{ $product->Name }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ $product->Description }}</p>
                    <p class="mt-2 font-bold text-blue-600">Rs. {{ $product->Price }}</p>

                    <form method="POST" action="{{ url('cart/add') }}" class="mt-auto">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->PharmacyId }}">
                        <button type="submit" class="w-full mt-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="col-span-4 text-center text-gray-500">No pharmacy products available.</p>
        @endif
    </section>
</div>
@endsection
