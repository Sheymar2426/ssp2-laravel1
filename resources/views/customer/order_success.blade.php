@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto py-16 text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-4">✅ Order Placed Successfully!</h1>
    <p class="text-lg text-gray-700 mb-6">Thank you for shopping with us. Your order has been recorded and will be processed shortly.</p>
    <a href="{{ url('products') }}" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">
        Continue Shopping
    </a>
</div>
@endsection
