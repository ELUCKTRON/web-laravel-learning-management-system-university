@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <div class="bg-[#181818] rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-8 text-center">Contact Us</h1>

        <div class="bg-[#222222] rounded-md p-6 space-y-8">

            <div class="space-y-2">
                <h2 class="text-2xl font-semibold text-orange-400">Author</h2>
                <p class="text-lg text-gray-300">Saeed Khanloo</p>
            </div>

            <div class="space-y-2">
                <h2 class="text-2xl font-semibold text-orange-400">Neptune Code</h2>
                <p class="text-lg text-gray-300">Something</p>
            </div>

            <div class="space-y-2">
                <h2 class="text-2xl font-semibold text-orange-400">Email Address</h2>
                <p class="text-lg text-gray-300">Example@yahoo.com</p>
            </div>

            <div class="pt-8 text-center">
                <a href="{{ url('/') }}"
                   class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded transition">
                    Back to Home
                </a>
            </div>

        </div>
    </div>
@endsection
