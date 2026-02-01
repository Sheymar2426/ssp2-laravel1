@extends('layouts.master')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

        @if(session('error_message'))
            <p class="text-red-500 text-sm mb-4">{{ session('error_message') }}</p>
        @endif

        <form method="POST" action="{{ url('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Full Name</label>
                <input type="text" name="name" required class="w-full border px-3 py-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Password</label>
                <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
        </form>

        <p class="text-center mt-4 text-sm">
            Already have an account? <a href="{{ url('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
