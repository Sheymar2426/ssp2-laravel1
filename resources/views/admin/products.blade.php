@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <h2 class="text-xl font-semibold mb-3">Add Product</h2>
    <form method="POST" action="{{ route('admin.products.store') }}" class="flex flex-wrap gap-3 mb-6">
        @csrf
        <input type="text" name="Name" placeholder="Name" class="border p-2 rounded" required>
        <input type="number" step="0.01" name="Price" placeholder="Price" class="border p-2 rounded" required>
        <input type="number" name="Stock" placeholder="Stock" class="border p-2 rounded">
        <input type="text" name="Description" placeholder="Description" class="border p-2 rounded">
        <input type="text" name="CategoryId" placeholder="Category ID" class="border p-2 rounded" required>
        <input type="text" name="Image" placeholder="images/products/example.jpg" class="border p-2 rounded">
        <input type="text" name="Brand" placeholder="Brand" class="border p-2 rounded">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add</button>
    </form>

    <h2 class="text-xl font-semibold mb-3">Existing Products</h2>
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Category</th>
                <th class="px-4 py-2 border">Price</th>
                <th class="px-4 py-2 border">Stock</th>
                <th class="px-4 py-2 border">Image</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $p)
            <tr>
                <form method="POST" action="{{ route('admin.products.update', $p->id) }}" class="contents">
                    @csrf
                    @method('PUT')
                    <td class="px-4 py-2 border">{{ $p->ProductId }}</td>
                    <td class="px-4 py-2 border"><input type="text" name="Name" value="{{ $p->Name }}" class="border rounded p-1 w-full"></td>
                    <td class="px-4 py-2 border">{{ $p->CategoryName }}</td>
                    <td class="px-4 py-2 border"><input type="text" name="Price" value="{{ $p->Price }}" class="border rounded p-1 w-full"></td>
                    <td class="px-4 py-2 border"><input type="text" name="Stock" value="{{ $p->Stock }}" class="border rounded p-1 w-full"></td>
                    <td class="px-4 py-2 border">
                        @if($p->Image)
                            <img src="{{ asset($p->Image) }}" alt="Product Image" width="80">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="px-4 py-2 border flex gap-2">
                        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Update</button>
                </form>
                <form method="POST" action="{{ route('admin.products.destroy', $p->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
                    </td>
            </tr>
            @empty
            <tr><td colspan="7">No products found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
