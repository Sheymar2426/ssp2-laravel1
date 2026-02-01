 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pet Pal Hub') }}</title>

    <!--Tailwind CSS-->
    <script src="https://cdn.tailwindcss.com"></script>

     <!--Font Awesome--> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900">

     <!-- HEADER -->
    @include('partials.header')

    <!-- PAGE CONTENT -->
    <main class="min-h-screen">
        @yield('content')
    </main>

     <!-- FOOTER -->
    @include('partials.footer')

    @stack('modals')
    @livewireScripts
</body>
</html> 

