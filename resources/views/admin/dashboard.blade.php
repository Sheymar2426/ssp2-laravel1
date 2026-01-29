@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name ?? 'Admin' }} 👋</h1>
    <p>You are logged in as <strong>Admin</strong>.</p>

    <!-- Navigation Buttons -->
    <div class="flex gap-4 my-4">
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Orders</a>
        <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Customers</a>
        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Products</a>
        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Categories</a>
        <a href="{{ route('admin.reports') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Reports</a>
    </div>

    <div class="border p-6 bg-gray-100 rounded-lg text-center">
        <h2 class="text-xl font-semibold mb-2">Recent Tables</h2>
        <p>(Show recent orders, customers, or products here)</p>
    </div>
</div>
@endsection
