@extends('layouts.master')

@section('content')
<section class="relative bg-gray-100">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-6">
        <div class="bg-blue-900 text-white rounded-xl shadow-md w-[600px] h-[350px] flex flex-col justify-center p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $bird->CategoryName ?? 'BIRDS' }}</h1>
            <h2 class="text-2xl font-bold mb-4">Care for your feathered friends</h2>
            <p class="text-gray-200">Explore cages, foods, and accessories perfect for birds of all kinds.</p>
        </div>
        <div class="flex-shrink-0">
            <img src="{{ asset('images/birds.jpg') }}" alt="Colorful Bird" class="rounded-xl shadow-md w-[600px] h-[350px] object-cover">
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-900 mb-10">Shop By Category</h2>
        <div class="flex justify-center gap-6 flex-wrap">
            @foreach($birdCategories as $catName)
                @php $subId = $subCategoryMap[$catName] ?? 0; @endphp
                <a href="{{ url('products?category='.$bird->CategoryId.'&subcategory='.$subId) }}" 
                   class="p-8 bg-blue-100 rounded-xl shadow hover:shadow-lg cursor-pointer block text-center text-lg font-semibold">
                    {{ $catName }}
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
