@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Product</h1>

    <form action="{{ route('admin.products.update', ['ProductId' => $product->ProductId]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name', $product->Name) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- Price & Stock --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Price</label>
                <input type="text" name="price" value="{{ old('price', $product->Price) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Stock</label>
                <input type="number" name="stock" value="{{ old('stock', $product->Stock) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        {{-- Category & SubCategory (readonly) --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Category</label>
                <input type="text" value="{{ optional($product->category)->CategoryName ?? 'N/A' }}" readonly
                       class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 cursor-not-allowed">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">SubCategory</label>
                <input type="text" value="{{ optional($product->subcategory)->SubCategoryName ?? 'N/A' }}" readonly
                       class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 cursor-not-allowed">
            </div>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Current Image</label>
            @if($product->Image)
                <img src="{{ asset('storage/'.$product->Image) }}" alt="Product Image" class="w-32 h-32 object-cover mb-3 rounded border">
            @else
                <p class="text-gray-500 mb-2">No Image</p>
            @endif
            <input type="file" name="Image" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <small class="text-gray-500">Upload a new image to replace the current one</small>
        </div>

        {{-- Description --}}
        @if(isset($product->Description))
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="4"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->Description) }}</textarea>
        </div>
        @endif

        {{-- Buttons --}}
        <div class="flex gap-3 justify-start mt-4">
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">Update</button>
            <a href="{{ route('admin.products') }}" class="bg-gray-400 text-white px-5 py-2 rounded hover:bg-gray-500 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
