@extends("layouts.main")

@section("title", "ERROR-404")

@section("content")
    <div class="flex flex-col items-center justify-center text-center space-y-6 py-24">
        <h1 class="text-6xl font-bold text-orange-500">404</h1>
        <h2 class="text-3xl font-semibold text-white">Page Not Found</h2>
        <p class="text-gray-400 max-w-xl">
            Oops! The page you’re looking for doesn’t exist or may have been moved.
        </p>


        @if (isset($exception))
            <p class="text-sm text-red-400 max-w-xl italic">
               The error :  {{ $exception->getMessage() }}
            </p>
        @endif

        <a href="/" class="mt-6 bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 font-semibold transition">
            Go Back Home
        </a>
    </div>
@endsection
