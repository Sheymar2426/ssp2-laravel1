@extends('layouts.master')

@section('content')
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-6">
        <!-- Text Box -->
        <div class="bg-blue-900 text-white rounded-xl shadow-md w-[600px] h-[350px] flex flex-col justify-center p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $category->CategoryName ?? 'CATEGORY' }}</h1>
            <h2 class="text-2xl font-bold mb-4">Everything your {{ strtolower($category->CategoryName) }} needs</h2>
            <p class="text-gray-200">
                @if(strtolower($category->CategoryName) == 'cats')
                    Find premium products to keep your cats happy, healthy, and playful.
                @elseif(strtolower($category->CategoryName) == 'dogs')
                    Find premium products to keep your dogs happy, healthy, and active.
                @elseif(strtolower($category->CategoryName) == 'birds')
                    Explore cages, foods, and accessories perfect for birds of all kinds.
                @elseif(strtolower($category->CategoryName) == 'fish')
                    Get quality tanks, filters, and food to keep your fish thriving.
                @endif
            </p>
        </div>

        <!-- Image -->
        <div class="flex-shrink-0">
            @if(strtolower($category->CategoryName) == 'cats')
                <img src="{{ asset('images/cat2.jpg') }}" alt="Cats" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
            @elseif(strtolower($category->CategoryName) == 'dogs')
                <img src="{{ asset('images/dg1.jpg') }}" alt="Dogs" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
            @elseif(strtolower($category->CategoryName) == 'birds')
                <img src="{{ asset('images/birds.jpg') }}" alt="Birds" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
            @elseif(strtolower($category->CategoryName) == 'fish')
                <img src="{{ asset('images/a2.jpeg') }}" alt="Fish" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
            @endif
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @if($subCategories->isNotEmpty())
                @foreach($subCategories as $sub)
                    <a href="{{ route('products') }}?category={{ $category->CategoryId }}&subcategory={{ $sub->SubCategoryId }}" 
                       class="w-60 p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg block text-center font-bold text-black">
                        {{ strtoupper($sub->SubCategoryName) }}
                    </a>
                @endforeach
            @else
                <p class="text-gray-600 w-full text-center">No subcategories found for {{ $category->CategoryName }}.</p>
            @endif
        </div>
    </div>
</section>
@endsection
