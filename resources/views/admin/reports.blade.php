@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Sales Reports</h1>
    <p>Here you can view and generate sales reports.</p>
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">⬅ Back to Dashboard</a>
</div>
@endsection
