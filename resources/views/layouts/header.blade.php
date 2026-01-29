<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Pet Pal Hub</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

<header class="shadow" style="background: linear-gradient(to right, #03132b, #173d90, #1e8dd6);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top row -->
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/products/logo.png') }}" alt="Pet Pal Hub Logo" class="h-12 w-30">
                    <span class="text-lg font-bold text-white">Pet Pal Hub</span>
                </a>
            </div>

            <!-- Search Form -->
            <form method="GET" action="{{ url('/') }}" class="hidden md:flex items-center w-1/3">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="showProductListing">
                <input type="text" name="search" placeholder="Search products..."
                       class="w-full px-3 py-2 rounded-l-full border border-gray-300 focus:outline-none"
                       value="{{ request('search') }}" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-full hover:bg-blue-700">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Right Links -->
            <div class="flex items-center space-x-4">
                <a href="{{ url('/track') }}" class="text-white hover:text-gray-200">Track Your Order</a>
                <a href="{{ url('/login') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Sign In</a>

                <a href="{{ url('/cart') }}" class="relative text-white hover:text-gray-200">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
                        {{ session('cart_count', 0) }}
                    </span>
                </a>

                <a href="{{ url('/profile') }}" class="text-white hover:text-gray-200">
                    <i class="fas fa-user-circle fa-lg"></i>
                </a>
            </div>
        </div>

        <!-- Bottom Nav -->
        <nav class="flex justify-center space-x-6 py-2 text-white font-medium relative">
            <a href="{{ url('/') }}" class="hover:text-gray-200">Home</a>

            <!-- Shop By Pet Dropdown -->
            <div class="relative group">
                <button type="button" class="hover:text-gray-200 flex items-center focus:outline-none">
                    Shop By Pet
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute left-0 mt-2 w-40 bg-blue-600 text-white border rounded-lg shadow-lg 
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <a href="{{ url('/cats') }}" class="block px-4 py-2 hover:bg-blue-700">Cats</a>
                    <a href="{{ url('/dogs') }}" class="block px-4 py-2 hover:bg-blue-700">Dogs</a>
                    <a href="{{ url('/fish') }}" class="block px-4 py-2 hover:bg-blue-700">Fish</a>
                    <a href="{{ url('/birds') }}" class="block px-4 py-2 hover:bg-blue-700">Birds</a>
                </div>
            </div>

            <!-- Learning Dropdown -->
            <div class="relative group">
                <button type="button" class="hover:text-gray-200 flex items-center focus:outline-none">
                    Learning
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-blue-600 text-white border rounded-lg shadow-lg 
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <a href="{{ url('/animalCare') }}" class="block px-4 py-2 hover:bg-blue-700">Animal Care</a>
                    <a href="{{ url('/training') }}" class="block px-4 py-2 hover:bg-blue-700">Training</a>
                    <a href="{{ url('/nutrition') }}" class="block px-4 py-2 hover:bg-blue-700">Nutrition</a>
                    <a href="{{ url('/behavior') }}" class="block px-4 py-2 hover:bg-blue-700">Behavior</a>
                </div>
            </div>

            <a href="{{ url('/pharmacy') }}" class="hover:text-gray-200">Pharmacy</a>
        </nav>
    </div>
</header>
