<footer class="bg-blue-200 border-t mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
        <a href="{{ url('/about') }}" class="text-gray-600 text-sm hover:underline">Learn more about us</a>

        <div>
            <h3 class="font-bold mb-4">Contact Us</h3>
            <p class="text-sm text-gray-600">petpalhub@email.com</p>
            <p class="text-sm text-gray-600">0765081203</p>
            <p class="text-sm text-gray-600">0750121203</p>
        </div>

        <div>
            <h3 class="font-bold mb-4">Help Center</h3>
            <ul class="text-sm text-gray-600 space-y-2">
                <li><a href="#" class="hover:text-blue-600">Track your order</a></li>
                <li><a href="#" class="hover:text-blue-600">Store location</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold mb-4">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-twitter fa-lg"></i></a>
            </div>
        </div>
    </div>

    <div class="text-center text-sm text-gray-500 py-4 border-t">
        © {{ date('Y') }} Pet Pal Hub. All rights reserved.
    </div>
</footer>
</body>
</html>
