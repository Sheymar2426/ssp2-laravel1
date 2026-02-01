@extends('layouts.master')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Checkout</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @php $cart = session('cart', []); @endphp

    @if(!empty($cart))
        <div class="overflow-x-auto shadow rounded-lg mb-6">
            <table class="min-w-full bg-white rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-3 px-6 text-left">Product</th>
                        <th class="py-3 px-6 text-left">Quantity</th>
                        <th class="py-3 px-6 text-left">Price</th>
                        <th class="py-3 px-6 text-left">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($cart as $item)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="py-3 px-6 flex items-center gap-2">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-12 h-12 object-cover rounded">
                                <span>{{ $item['name'] }}</span>
                            </td>
                            <td class="py-3 px-6">{{ $item['quantity'] }}</td>
                            <td class="py-3 px-6">${{ number_format($item['price'], 2) }}</td>
                            <td class="py-3 px-6">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-right mb-6">
            <h3 class="text-xl font-bold">Total: ${{ number_format(collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']), 2) }}</h3>
        </div>

        <form method="POST" action="{{ route('checkout.confirm') }}">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                Place Order
            </button>
        </form>
    @else
        <p class="text-gray-600">Your cart is empty.</p>
    @endif
</div>
@endsection
