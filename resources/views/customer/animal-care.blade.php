@extends('layouts.master')

@section('content')
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Animal Care</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="bg-blue-900 text-white p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-2">Learn how to take care of your pets</h2>
                <p class="text-gray-200">Guides, tips, and expert advice on keeping your pets healthy and happy.</p>
            </div>
            <img src="{{ asset('images/animalCare.jpeg') }}" alt="Animal Care" class="rounded-xl shadow-md">
        </div>
    </div>
</section>

<!-- Articles Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Popular Guides</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-lg">
                <h3 class="text-lg font-semibold">Basic Pet Care</h3>
                <p class="text-gray-700 mt-2">Everything you need to know about feeding, grooming, and safety.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-lg">
                <h3 class="text-lg font-semibold">Health Tips</h3>
                <p class="text-gray-700 mt-2">How to keep your pets strong and avoid common health issues.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-lg">
                <h3 class="text-lg font-semibold">Emergency Care</h3>
                <p class="text-gray-700 mt-2">Steps to follow in case of accidents or urgent medical needs.</p>
            </div>
        </div>
    </div>
</section>
@endsection
