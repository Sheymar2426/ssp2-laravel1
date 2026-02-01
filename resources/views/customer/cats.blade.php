@extends('layouts.master')

@section('content')
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-2">
        <!-- Blue text box -->
        <div class="bg-blue-900 text-white rounded-xl shadow-md w-[600px] h-[350px] flex flex-col justify-center p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $category->CategoryName ?? 'CATS' }}</h1>
            <h2 class="text-2xl font-bold mb-4">Everything your cat needs</h2>
            <p class="text-gray-200">Find premium products to keep your cats happy, healthy, and playful.</p>
        </div>

        <!-- Image next to the box -->
        <div class="flex-shrink-0">
            <img src="{{ asset('images/cat2.jpg') }}" alt="Happy Cat" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @if($subCategories->isNotEmpty())
                @foreach($subCategories as $sub)
                    <a href="{{ url('products?category='.$category->CategoryId.'&subcategory='.$sub->SubCategoryId) }}" 
                       class="w-60 p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg block text-center">
                        <div class="font-bold text-black text-lg">{{ $sub->SubCategoryName }}</div>
                    </a>
                @endforeach
            @else
                <p class="text-gray-600 w-full text-center">No subcategories found.</p>
            @endif
        </div>
    </div>
</section>
@endsection
