@extends("layouts.main")

@section("title", "Task edit")

@section("content")
    <div class="bg-[#181818] rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-white mb-6">Edit Task</h2>

        <form action="{{ route("tasks.update",["task"=>$task->id]) }}" method="POST" class="space-y-6">
            @csrf
            @method("put")
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-300 mb-1">Task Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name',$task->name) }}"
                    placeholder="e.g., Final Project"
                    class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2
                        @error('name') border border-red-500 focus:ring-red-500 @else focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @enderror"
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="description" class="block text-sm font-semibold text-gray-300 mb-1">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Describe the task requirements..."
                    class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2
                        @error('description') border border-red-500 focus:ring-red-500 @else focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @enderror"
                >{{ old('description',$task->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="points" class="block text-sm font-semibold text-gray-300 mb-1">Points</label>
                <input
                    type="number"
                    id="points"
                    name="points"
                    min="0"
                    value="{{ old('points',$task->points) }}"
                    placeholder=" between 1-5 , e.g., 3"
                    class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2
                        @error('points') border border-red-500 focus:ring-red-500 @else focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @enderror"
                >
                @error('points')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex space-x-4">
                <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 font-semibold transition">
                    Edit Task
                </button>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                class="bg-[#333] text-white px-6 py-3 rounded hover:bg-[#444] transition font-semibold">
                    Cancel
                </a>

            </div>
        </form>
    </div>
@endsection
