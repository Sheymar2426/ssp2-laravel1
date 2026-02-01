<header class="shadow" style="background: linear-gradient(to right, #03132b, #173d90, #1e8dd6);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top row -->
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Pet Pal Hub Logo" class="h-12 w-30">
                    <span class="text-lg font-bold text-white">Pet Pal Hub</span>
                </a>
            </div>

            <!-- Search Form -->
            <form method="GET" action="{{ route('products') }}" class="hidden md:flex items-center w-1/3">
                <input type="text" name="search" placeholder="Search products..."
                       class="w-full px-3 py-2 rounded-l-full border border-gray-300 focus:outline-none"
                       value="{{ request('search') }}" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-full hover:bg-blue-700">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Right Links -->
            <div class="flex items-center space-x-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-black-600 hover:underline">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Sign In</a>
                @endauth

                <!-- Livewire Cart Counter -->

                @livewire('cart-counter')

                @auth
                    <a href="{{ route('profile.show') }}" class="text-white hover:text-gray-200">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Bottom Nav -->
        <nav class="flex justify-center space-x-6 py-2 text-white font-medium relative">
            <a href="{{ route('dashboard') }}" class="hover:text-gray-200">Home</a>

            <!-- Shop By Pet Dropdown -->
            <div class="relative group">
                <button type="button" class="hover:text-gray-200 flex items-center focus:outline-none">
                    Shop By Pet
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute left-0 mt-2 w-40 bg-blue-600 text-white border rounded-lg shadow-lg 
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <a href="{{ route('cats') }}" class="block px-4 py-2 hover:bg-blue-700">Cats</a>
                    <a href="{{ route('dogs') }}" class="block px-4 py-2 hover:bg-blue-700">Dogs</a>
                    <a href="{{ route('fish') }}" class="block px-4 py-2 hover:bg-blue-700">Fish</a>
                    <a href="{{ route('birds') }}" class="block px-4 py-2 hover:bg-blue-700">Birds</a>
                </div>
            </div>

            <div class="relative group">
                <button type="button" class="hover:text-gray-200 flex items-center focus:outline-none">
                    Learning
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
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

            <a href="{{ route('customer.pharmacy') }}" class="hover:text-gray-200">Pharmacy</a>
        </nav>
    </div>
</header>
