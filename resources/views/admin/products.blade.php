@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Products</h1>

<a href="{{ route('admin.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">
    Add New Product
</a>

<table class="table-auto w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Price</th>
            <th class="px-4 py-2 border">Stock</th>
            <th class="px-4 py-2 border">Category</th>
            <th class="px-4 py-2 border">SubCategory</th>
            <th class="px-4 py-2 border">Image</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $p)
        <tr>
            <td class="px-4 py-2 border">{{ $p->ProductId }}</td>
            <td class="px-4 py-2 border">{{ $p->Name }}</td>
            <td class="px-4 py-2 border">{{ $p->Price }}</td>
            <td class="px-4 py-2 border">{{ $p->Stock }}</td>
            <td class="px-4 py-2 border">{{ $p->category ? $p->category->CategoryName : 'N/A' }}</td>
<td class="px-4 py-2 border">{{ $p->subcategory ? $p->subcategory->SubCategoryName : 'N/A' }}</td>
            <!-- <td class="px-4 py-2 border">
                @if($p->Image)
                    <img src="{{ asset('storage/'.$p->Image) }}" class="w-16 h-16 object-cover">
                @else
                    No Image
                @endif
            </td> -->

            <td class="px-4 py-2 border">Image</td>

            <td class="px-4 py-2 border flex gap-2">
                <a href="{{ route('admin.products.edit', ['ProductId' => $p->ProductId]) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>

                <form method="POST" action="{{ route('admin.products.delete', ['ProductId' => $p->ProductId]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
        onclick="return confirm('Delete this product?')">
        Delete
    </button>
</form>

            </td>
        </tr>
        @empty
        <tr><td colspan="8">No products found.</td></tr>
        @endforelse
    </tbody>
</table>

@endsection
