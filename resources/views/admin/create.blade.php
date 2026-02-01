@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded">
    <h2 class="text-2xl font-bold mb-6">Add New Product</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1">Product Name</label>
            <input type="text" name="Name" value="{{ old('Name') }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Price</label>
            <input type="number" step="0.01" name="Price" value="{{ old('Price') }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Stock</label>
            <input type="number" name="Stock" value="{{ old('Stock') }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Image</label>
            <input type="file" name="Image" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Category</label>
            <select name="CategoryId" class="w-full border p-2 rounded" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->CategoryId }}" {{ old('CategoryId') == $cat->CategoryId ? 'selected' : '' }}>
                        {{ $cat->CategoryName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
    <label class="block font-medium mb-1">Subcategory</label>
    <select name="SubCategoryId" class="w-full border p-2 rounded" required>
        <option value="">-- Select Subcategory --</option>
        @foreach($subcategories as $sub)
            <option value="{{ $sub->SubcategoryId }}" {{ old('SubCategoryId') == $sub->SubcategoryId ? 'selected' : '' }}>
                {{ $sub->SubcategoryName }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mt-6">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Add Product
            </button>
        </div>
    </form>
</div>
@endsection

