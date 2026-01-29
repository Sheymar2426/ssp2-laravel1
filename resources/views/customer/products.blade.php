@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">
        {{ $subcategoryName ?? (!empty($filters['search']) ? 'Search Results' : 'Products') }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @if(!empty($products['products']))
            @foreach($products['products'] as $product)
                <div class="border rounded-lg shadow hover:shadow-lg p-4 bg-white">
                    <img src="{{ asset(ltrim($product['Image'], '/')) }}" alt="{{ $product['Name'] }}" class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product['Name'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $product['Description'] }}</p>
                    <p class="text-blue-700 font-bold mt-2">${{ number_format($product['Price'], 2) }}</p>

                    <form method="POST" action="{{ url('cart/add') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['ProductId'] }}">
                        <input type="hidden" name="name" value="{{ $product['Name'] }}">
                        <input type="hidden" name="price" value="{{ $product['Price'] }}">
                        <input type="hidden" name="image" value="{{ $product['Image'] }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mt-2 w-full">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-gray-600">No products found.</p>
        @endif
    </div>
</div>
@endsection
