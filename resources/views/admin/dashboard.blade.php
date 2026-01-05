@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-2">Welcome, {{ auth()->user()->name }} 👋</h1>
    <p class="mb-6">You are logged in as <strong>Admin</strong>.</p>

    <!-- Navigation Buttons -->
    <div class="flex flex-wrap gap-4 mb-8">
        <a href="{{ route('admin.orders.index') }}"
           class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Orders</a>
        <a href="{{ route('admin.customers.index') }}"
           class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800">Customers</a>
        <a href="{{ route('admin.products.index') }}"
           class="px-4 py-2 bg-yellow-700 text-white rounded hover:bg-yellow-800">Products</a>
        <a href="{{ route('admin.categories.index') }}"
           class="px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">Categories</a>
        <a href="{{ route('admin.reports.sales') }}"
           class="px-4 py-2 bg-red-700 text-white rounded hover:bg-red-800">Reports</a>
    </div>

    <!-- Main Content -->
    <div class="border p-6 bg-gray-100 text-center rounded">
        <h2 class="text-xl font-bold mb-2">Recent Tables</h2>
        <p>(Show recent orders, customers, or products here)</p>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">
            Logout
        </button>
    </form>
</div>
@endsection
