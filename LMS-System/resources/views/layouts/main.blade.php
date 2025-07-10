<!DOCTYPE html>
<html lang="en" class="bg-black text-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ClassHub') }} — @yield('title', 'MainPage')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen font-sans antialiased">

    <!-- Navbar -->
    <header class="bg-[#181818] border-b border-gray-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="block transition hover:scale-105">
            <img src="{{ asset('images/logo.png') }}" alt="ClassHub Logo" class="w-20 h-20 sm:w-15 sm:h-15" />
        </a>
        <nav class="space-x-4 relative">
        <a href="/contact" class="bg-[#222] text-white px-4 py-2 rounded hover:bg-[#333] transition font-semibold">
            Contact Us
        </a>

        @auth
                <div x-data="{ open: false }" class="inline-block relative">
                    <button @click="open = !open"
                        class="flex items-center bg-[#222] text-white px-4 py-2 rounded hover:bg-[#333] transition font-semibold">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 ml-2 fill-current" viewBox="0 0 20 20">
                            <path d="M5.25 7.5l4.5 4.5 4.5-4.5"></path>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-[#181818] border border-gray-700 rounded shadow-lg z-50">

                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 text-gray-200 hover:bg-gray-700 transition">Dashboard</a>

                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-gray-200 hover:bg-gray-700 transition">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-red-400 hover:bg-red-800 hover:text-white transition">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @else

                <a href="{{ route('login') }}"
                    class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200 font-semibold transition">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 font-semibold transition">Sign Up</a>
            @endauth
        </nav>


        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow bg-black text-gray-300 py-16">
        <div class="container mx-auto px-6">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#181818] border-t border-gray-800 py-6 mt-12">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} ClassHub. All rights reserved.</p>
            <div class="space-x-4 mt-2 md:mt-0">
                <a href="#" class="hover:text-orange-500">About</a>
                <a href="#" class="hover:text-orange-500">Contact</a>
                <a href="#" class="hover:text-orange-500">Privacy</a>
            </div>
        </div>
    </footer>

</body>
</html>
