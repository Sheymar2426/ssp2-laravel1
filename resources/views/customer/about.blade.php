@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative mt-16">
    <img src="{{ asset('images/products/d1.jpg') }}" 
         alt="Dog and Cat" 
         class="w-full h-96 object-cover">
</section>

<!-- Vision & Mission -->
<section class="py-12" style="background-color: #4ca3a9;">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl md:text-3xl font-bold text-teal-800 mb-4">
            Our Vision and Mission
        </h2>
        <p class="text-gray-700 leading-relaxed">
            To provide pet owners with a wide range of affordable, high-quality pet products and supplies 
            through a user-friendly, secure, and mobile-responsive platform, ensuring convenience, trust, 
            and a seamless shopping experience. And to become Sri Lanka’s most trusted and preferred online 
            pet care marketplace, empowering pet owners with convenience, choice, and innovation while promoting 
            the health and happiness of pets everywhere.
        </p>
    </div>
</section>

<!-- Our Stories -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="bg-blue-900 text-white px-4 py-2 rounded-md inline-block font-bold text-lg mb-8">
            Our Stories
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            
            <div>
                <img src="{{ asset('images/products/ct2.jpg') }}" 
                     alt="Pet care" 
                     class="w-full rounded-lg shadow-md">
            </div>

            <div class="bg-blue-900 text-white p-6 rounded-lg shadow-md">
                <p class="leading-relaxed">
                    At Pet Pal Hub, we understand that pets are more than just animals — they are family. 
                    Our journey began with a simple idea: to make pet care more convenient and accessible 
                    for every pet owner in Sri Lanka.
                </p>
                <p class="leading-relaxed mt-4">
                    We noticed that many local pet stores often had limited stock and required owners to 
                    physically visit stores, sometimes even veterinary clinics, just to find the essentials 
                    for their beloved pets. This inspired us to create a digital platform that brings together 
                    a wide variety of pet products — from food and toys to health supplies — all in one place.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
