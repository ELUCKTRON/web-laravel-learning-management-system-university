@extends("layouts.main")

@section("title", "Subject Details")

@section("content")
    <h1 class="text-3xl font-bold text-white mb-2">
        SUBJECT DETAILS
        <span class="text-sm text-gray-400 font-normal">
            @if(auth()->user()->role === 'teacher') — as Teacher
            @else — as Student
            @endif
        </span>
    </h1>

    <div class="bg-[#181818] p-6 rounded shadow mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">{{ $subject->name }}</h2>
        <p class="text-gray-400">{{ $subject->description }}</p>
        <p class="text-gray-400 mb-4">Credit: {{ $subject->credit }}</p>


        <div class="flex space-x-4 flex-wrap items-center mt-4">
            @if(auth()->user()->role === 'teacher')
                <a href="{{ route('subjects.edit', ['subject' => $subject->id]) }}"
                class="px-4 py-2 bg-[#333] text-white rounded hover:bg-[#444] transition font-semibold">
                    ✏️ Edit Subject
                </a>
            @endif

            @php
                $actionWord = auth()->user()->role === 'teacher' ? 'delete' : 'drop';
                $buttonText = auth()->user()->role === 'teacher' ? '🗑️ Delete Subject' : '📤 Drop Subject';
            @endphp

            <form action="{{ route('subjects.destroy', ['subject' => $subject->id]) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to {{ $actionWord }} this subject?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="cursor-pointer px-4 py-2 bg-[#3b0b0b] text-red-400 border border-red-500 hover:bg-red-800 hover:text-white rounded transition font-semibold">
                    {{ $buttonText }}
                </button>
            </form>

            <a href="{{ route('subjects.index') }}"
            class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition font-semibold">
                ⬅️ Back to All Subjects
            </a>
        </div>

    </div>

    @if(auth()->user()->role === 'teacher')
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-2xl font-semibold text-white">Tasks</h3>
            <a href="{{ route('subjects.tasks.create', ['subject' => $subject->id]) }}"
               class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 font-semibold transition">
                 Add New Task
            </a>
        </div>
    @else
        <h3 class="text-2xl font-semibold text-white mb-4">Tasks</h3>
    @endif

    <div class="space-y-4">
        @foreach ($tasks as $task)
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
               class="block bg-[#222222] p-4 rounded-md shadow hover:border hover:border-orange-400 transition">
                <h4 class="text-lg font-bold text-white">{{ $task->name }}</h4>
                <p class="text-sm text-gray-400">Description: {{ $task->description }}</p>
                <p class="text-sm text-gray-400">Points: {{ $task->points }}</p>
            </a>
        @endforeach
    </div>
@endsection
