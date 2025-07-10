@extends("layouts.main")

@section("title", "TTD")

@section("content")
<h1 class="text-3xl font-bold text-white mb-2">
    Task DETAILS
    <span class="text-sm text-gray-400 font-normal">
        @if(auth()->user()->role === 'teacher') — as Teacher
        @else — as Student
        @endif
    </span>
</h1>

<div class="bg-[#181818] p-6 rounded shadow mb-8">
    <h2 class="text-3xl font-bold text-white mb-2">{{ $task->name }}</h2>
    <p class="text-gray-400">Task Description: {{ $task->description }}</p>
    <p class="text-gray-400 mb-4">Max Points: {{ $task->points }}</p>

    <a href="{{ route('subjects.show', ['subject' => $task->subject->id]) }}"
    class="inline-block mt-4 bg-gray-700 text-white px-6 py-2 rounded hover:bg-gray-600 font-semibold transition">
        ⬅️ Back to The Subject
    </a>


    @if(auth()->user()->role === 'teacher')
        <div class="flex space-x-4 mt-4">
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
               class="px-4 py-2 bg-[#333] text-white rounded hover:bg-[#444] transition font-semibold">
                ✏️ Edit Task
            </a>

            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="cursor-pointer px-4 py-2 bg-[#3b0b0b] text-red-400 border border-red-500 rounded hover:bg-red-800 hover:text-white transition font-semibold">
                    🗑️ Delete Task
                </button>
            </form>
        </div>
    @endif
</div>

@if(auth()->user()->role === 'teacher')
    <h3 class="text-2xl font-semibold text-white mb-4">Submitted Solutions</h3>
    <div class="space-y-6">
        @forelse ($solutions as $solution)
            <div class="bg-[#2a2a2a] p-6 rounded-md shadow border border-gray-700">
                <p class="text-white font-semibold">📌 Title: {{ $solution->title ?? 'No Title Provided' }}</p>
                <p class="text-white font-semibold">{{ $solution->user->name }}</p>
                <p class="text-sm text-gray-400">Submitted on: {{ $solution->created_at->format('Y-m-d') }}</p>
                <p class="mt-3 text-gray-300 italic">{{ $solution->content }}</p>

                @if($solution->file_path)
                    <a href="{{ route('downloads.show', basename($solution->file_path)) }}"
                       class="mt-3 inline-block text-orange-400 hover:underline hover:text-orange-300">
                        📄 View / Download File
                    </a>
                @endif

                <form action="{{ route('solutions.grade', ['solution' => $solution->id]) }}" method="POST" class="mt-6">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <label for="points" class="text-sm text-gray-400">Grade:</label>
                        <select name="grade" id="points"
                            class="w-32 p-3 rounded bg-[#222222] text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            required>
                            <option value="" disabled {{ $solution->grade === null ? 'selected' : '' }}>Select</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ $solution->grade == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit"
                                class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 font-semibold transition">
                            Submit Grade
                        </button>
                    </div>
                </form>
            </div>
        @empty
            <p class="text-gray-400">No solutions submitted yet.</p>
        @endforelse
    </div>

@else
    <h3 class="text-2xl font-semibold text-white mb-4">Your Solution</h3>

    @if($solution)
        <div class="bg-[#2a2a2a] p-6 rounded-md shadow border border-gray-700">
            <p class="text-white font-semibold">📌 Title: {{ $solution->title ?? 'No Title Provided' }}</p>
            <p class="text-sm text-gray-400">Submitted on: {{ $solution->created_at->format('Y-m-d') }}</p>
            <p class="mt-3 text-gray-300 italic">{{ $solution->content }}</p>

            @if($solution->file_path)
                <a href="{{ route('downloads.show', basename($solution->file_path)) }}"
                   class="mt-3 inline-block text-orange-400 hover:underline hover:text-orange-300">
                     📄 View / Download File
                </a>
            @endif

            @if(!is_null($solution->grade))
                <p class="mt-2 text-sm font-semibold
                    {{ $solution->grade == 1 ? 'text-red-600' :
                        ($solution->grade <= 3 ? 'text-yellow-400' : 'text-green-400') }}">
                     Graded: <strong>{{ $solution->grade }}/5</strong>
                </p>
            @else
                <p class="mt-2 text-sm text-yellow-400">⏳ Awaiting grade</p>
            @endif


            <div class="mt-4 flex space-x-4">
                <a href="{{ route('solutions.edit', $solution->id) }}" class="px-4 py-2 bg-[#333] text-white rounded hover:bg-[#444] transition font-semibold">
                    ✏️ Edit Solution
                </a>
                <form action="{{ route('solutions.destroy', $solution->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your solution?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-[#3b0b0b] text-red-400 border border-red-500 rounded hover:bg-red-800 hover:text-white transition font-semibold">
                        🗑️ Delete Solution
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('subjects.tasks.solutions.create', ['subject' => $task->subject->id, 'task' => $task->id]) }}"
           class="block w-max bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 font-semibold transition">
            📥 Submit Your Solution
        </a>
    @endif
@endif
@endsection
