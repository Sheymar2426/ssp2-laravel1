@extends('layouts.master')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }} 👋</h1>
    <p>You are logged in as <strong>Admin</strong>.</p>

    <div class="flex gap-4 my-4">
        <a href="{{ route('admin.orders') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Orders</a>
        <a href="{{ route('admin.customers') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Customers</a>
        <a href="{{ route('admin.products') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Products</a>
        <a href="{{ route('admin.categories') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Categories</a>
        <a href="{{ route('admin.reports') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Reports</a>
    </div>
</div>
@endsection
