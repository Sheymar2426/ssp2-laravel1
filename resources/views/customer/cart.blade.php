@extends('layouts.master')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-center">CART</h1>

    @if(!empty(session('cart')))
        @php $total = 0; @endphp
        @foreach(session('cart') as $item)
            <div class="flex items-center justify-between bg-gray-100 p-4 mb-4 rounded">
                <div class="flex items-center gap-4">
                    @php
                        $imagePath = $item['image'] ?? 'images/no-image.png';
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="{{ $item['name'] ?? 'No name' }}" class="w-24 h-24 object-cover rounded">
                    <div>
                        <p class="font-bold">{{ $item['name'] }}</p>
                        <p>${{ number_format($item['price'], 2) }}</p>
                        <p>Qty: {{ (int) $item['quantity'] }}</p>
                    </div>
                </div>
                <a href="{{ url('cart/remove/'.$item['id']) }}" class="text-red-600 hover:text-red-800">🗑</a>
            </div>
            @php $total += $item['price'] * $item['quantity']; @endphp
        @endforeach

        <div class="text-right font-bold text-lg">Total: ${{ number_format($total, 2) }}</div>
        <div class="text-center mt-6">
            <a href="{{ url('checkout') }}" class="bg-blue-600 text-white px-6 py-3 rounded">Checkout</a>
        </div>
    @else
        <p class="text-center">Your cart is empty.</p>
    @endif
</div>
@endsection
