@extends('layouts.master')

@section('content')
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Nutrition</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="bg-blue-900 text-white p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-2">Proper diet for happy pets</h2>
                <p class="text-gray-200">Discover the best nutrition practices to keep your pets healthy and full of energy.</p>
            </div>
            <img src="{{ asset('images/n2.jpeg') }}" alt="Nutrition" class="rounded-xl shadow-md">
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Nutrition Topics</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-lg">
                <h3 class="text-lg font-semibold">Balanced Diets</h3>
                <p class="text-gray-700 mt-2">How to balance proteins, fats, and carbs in meals.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-lg">
                <h3 class="text-lg font-semibold">Supplements</h3>
                <p class="text-gray-700 mt-2">When and how to add vitamins or supplements safely.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-lg">
                <h3 class="text-lg font-semibold">Special Diets</h3>
                <p class="text-gray-700 mt-2">Food plans for pets with allergies or conditions.</p>
            </div>
        </div>
    </div>
</section>
@endsection
