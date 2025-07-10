@extends("layouts.main")

@section("title", "Subjects")

@section("content")
    <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-white mb-2">
        My Subjects
        <span class="text-sm text-gray-400 font-normal">
            @if(auth()->user()->role === 'teacher') — as Teacher
            @else — as Student
            @endif
        </span>
    </h1>

        <a href="{{ route('subjects.create') }}"
           class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 font-semibold transition">
            @if(Auth::user()->role === 'teacher')
                Create New Subject
            @else
                Enroll in Subject
            @endif
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach ($subjects as $subject)
            <a href="{{ route('subjects.show', ['subject' => $subject->id]) }}"
               class="block bg-[#181818] rounded-lg shadow p-6 hover:border hover:border-orange-400 transition">
                <h3 class="text-xl font-bold text-white">{{ $subject->name }}</h3>
                <p class="text-gray-400 mt-2">{{ $subject->description }}</p>
                <p class="text-gray-500 text-sm mt-1">Credit: {{ $subject->credit }}</p>
            </a>
        @endforeach
    </div>
@endsection
