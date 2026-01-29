@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section class="bg-blue-900 text-white py-10 mt-6">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-6 px-4">
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-semibold">WELCOME TO PET PAL HUB</h2>
            <p class="mt-2 text-lg">
                Get <span class="font-bold">20% off</span> and <span class="font-bold">Free Delivery</span> on your First Order
            </p>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('images/products/hero.jpg') }}" 
                 alt="Sleeping Pets"
                 class="mx-auto w-200 h-160 object-cover rounded shadow-lg" />
        </div>
    </div>
</section>

<!-- Featured Products Button -->
<div class="text-center mt-4">
    <button class="bg-blue-900 text-white px-6 py-2 rounded-md text-sm">
        Featured Products
    </button>
</div>

<!-- Category Section -->
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
        <div class="bg-blue-900 p-5 rounded-lg text-white text-center">
            <h3 class="text-xl font-bold mb-3">DOG FOOD</h3>
            <img src="{{ asset('images/products/pedigree_adult.jpg') }}" class="mx-auto w-60 h-50 object-cover rounded">
            <p class="mt-4 text-sm">20% on all orders above LKR.5000</p>
        </div>
        <div class="bg-blue-900 p-5 rounded-lg text-white text-center">
            <h3 class="text-xl font-bold mb-3">CAT FOOD</h3>
            <img src="{{ asset('images/products/whiskas_dry.jpg') }}" class="mx-auto w-60 h-50 object-cover rounded">
            <p class="mt-4 text-sm">Special offers</p>
        </div>
    </div>
</section>

<!-- Shop By Pet -->
<div class="text-center mt-4">
    <button class="bg-blue-900 text-white px-6 py-2 rounded-md text-lg">Shop By Pet</button>
</div>

<section class="flex justify-center gap-6 flex-wrap mt-8">
    <a href="{{ url('cats') }}" class="bg-blue-300 px-12 py-12 rounded-xl font-bold shadow text-3xl">CAT</a>
    <a href="{{ url('dogs') }}" class="bg-blue-300 px-12 py-12 rounded-xl font-bold shadow text-3xl">DOG</a>
    <a href="{{ url('fish') }}" class="bg-blue-300 px-12 py-12 rounded-xl font-bold shadow text-3xl">FISH</a>
    <a href="{{ url('birds') }}" class="bg-blue-300 px-12 py-12 rounded-xl font-bold shadow text-3xl">BIRD</a>
</section>

<!-- Deals Section -->
<div class="text-center mt-10">
    <button class="bg-blue-900 text-white px-12 py-2 rounded-md text-lg">DEALS</button>
</div>

<section class="flex justify-center flex-wrap gap-6 mt-8">
    <a href="{{ url('products?deal=clearance') }}" class="bg-blue-200 px-6 py-3 rounded-full">CLEARANCE SALE</a>
    <a href="{{ url('products?deal=discount') }}" class="bg-blue-200 px-6 py-3 rounded-full">DISCOUNT ITEMS</a>
</section>

<!-- Delivery Section -->
<section class="py-10">
    <h2 class="text-center text-xl font-bold mb-6">CONVENIENT WAYS TO SHOP</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl mx-auto px-4">
        <div class="text-center">
            <img src="{{ asset('images/products/cartoon1.jpg') }}" class="mx-auto w-40">
            <p class="mt-3 font-semibold">Same Day Delivery</p>
        </div>
        <div class="text-center">
            <img src="{{ asset('images/products/fast-delivery.png') }}" class="mx-auto w-40">
            <p class="mt-3 font-semibold">Ship to your home (2–3 days)</p>
        </div>
    </div>
</section>
@endsection
