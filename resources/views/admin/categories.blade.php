@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Manage Categories</h1>

    <!-- Add Category -->
    <form method="POST" action="{{ route('admin.categories.store') }}" class="bg-gray-50 p-4 rounded-lg shadow flex gap-4 items-end mb-6">
        @csrf
        <div>
            <label class="block text-sm font-medium">Category Name</label>
            <input type="text" name="CategoryName" required class="border rounded-lg px-3 py-2 w-64">
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Add Category</button>
    </form>

    <!-- List Categories -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Category Name</th>
                    <th class="px-4 py-2 border">Created At</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50">
                    <form method="POST" action="{{ route('admin.categories.update', $category->CategoryId) }}" class="contents">
                        @csrf
                        @method('PUT')
                        <td class="px-4 py-2 border">{{ $category->CategoryId }}</td>
                        <td class="px-4 py-2 border">
                            <input type="text" name="CategoryName" value="{{ $category->CategoryName }}" class="border rounded px-2 py-1 w-full">
                        </td>
                        <td class="px-4 py-2 border">{{ $category->created_at }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Update</button>
                    </form>
                    <form method="POST" action="{{ route('admin.categories.destroy', $category->CategoryId) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                        </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
