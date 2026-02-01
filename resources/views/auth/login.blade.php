@extends('layouts.master')

@section('content')
<div class="max-w-md mx-auto mt-16 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4 text-center">Login</h2>

    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="mb-4">
            <x-label for="password" value="{{ __('Password') }}" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="flex items-center justify-between mb-4">
            <label class="flex items-center">
                <x-checkbox name="remember" value="1" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif
        </div>

        <x-button class="w-full">
            {{ __('Log in') }}
        </x-button>

        <div class="text-center mt-4">
    <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">
        Don't have an account? Register
    </a>
</div>
    </form>
</div>

@endsection
