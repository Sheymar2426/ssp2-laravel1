@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>

        <form method="POST" action="{{ url('login') }}" class="space-y-4">
            @csrf
            @if(session('error_message'))
                <div class="bg-red-100 text-red-700 px-3 py-2 rounded">
                    {{ session('error_message') }}
                </div>
            @endif

            <div>
                <label for="email" class="block text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Login</button>
        </form>

        <div class="flex justify-between mt-4 text-sm">
            <a href="#" class="text-blue-600 hover:underline">Forgot Password</a>
            <a href="{{ url('register') }}" class="text-blue-600 hover:underline">Create New Account</a>
        </div>
    </div>
</div>
@endsection
