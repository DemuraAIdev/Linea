<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <header x-data="{ atTop: true, mobileMenuOpen: false }" x-init="window.addEventListener('scroll', () => { atTop = window.scrollY === 0 })"
        :class="atTop ? 'bg-black text-white' : 'bg-white text-black'"
        class="shadow-lg sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <i class="iconoir-hotel text-2xl"></i>
                    <span class="font-bold text-2xl ml-2">Linea</span>
                </div>
                <nav class="hidden md:flex space-x-4">
                    <a href="{{ route('welcome') }}" class="hover:text-gray-400 ">Home</a>
                </nav>
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('login') }}"
                        class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">Login</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="mobile-menu-button">
                        <i class="iconoir-menu text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <div x-show="mobileMenuOpen" class="md:hidden">
            <nav class="px-4 pt-4 pb-2 space-y-2">
                <a href="{{ route('welcome') }}" class="block hover:text-gray-400">Home</a>
                <a href="{{ route('login') }}"
                    class="block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">Login</a>
            </nav>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer class="bg-white py-6">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="text-gray-600">© 2024 Linea & Abdul Vaiz. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
