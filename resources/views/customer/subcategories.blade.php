@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">{{ $categoryName ?? 'Subcategories' }}</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
        @if(!empty($subcategories))
            @foreach($subcategories as $sub)
                <a href="{{ url('products?category='.$sub['CategoryId'].'&subcategory='.$sub['SubCategoryId']) }}" class="p-6 bg-blue-100 rounded-xl shadow hover:shadow-lg block text-center">
                    <div class="font-semibold text-lg">{{ $sub['SubCategoryName'] }}</div>
                </a>
            @endforeach
        @else
            <p class="text-gray-500">No subcategories found.</p>
        @endif
    </div>
</div>
@endsection
