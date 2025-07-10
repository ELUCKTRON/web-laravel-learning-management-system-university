@extends("layouts.main")

@section("title", "Edit Solution")

@section("content")
<div class="bg-[#181818] rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-white mb-6">✏️ Edit Your Solution</h2>

    <form action="{{ route('solutions.update', $solution->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-semibold text-gray-300 mb-1">Solution Title</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $solution->title) }}"
                placeholder="e.g., Final Project Submission"
                class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2
                    @error('title') border border-red-500 focus:ring-red-500
                    @else focus:ring-orange-500 focus:border-orange-500 @enderror"
            >
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label for="content" class="block text-sm font-semibold text-gray-300 mb-1">Text Content</label>
            <textarea
                id="content"
                name="content"
                rows="4"
                placeholder="Optional notes or explanation..."
                class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
            >{{ old('content', $solution->content) }}</textarea>
        </div>


        <div>
            <label for="file" class="block text-sm font-semibold text-gray-300 mb-1">Replace File (PDF, ZIP, Image)</label>
            <input
                type="file"
                name="file"
                id="file"
                class="block w-full text-white bg-[#222222] file:bg-orange-600 file:border-none file:rounded file:px-4 file:py-2 file:text-white hover:file:bg-orange-700 transition"
            >
            @if ($solution->file_path)
                <p class="text-sm text-orange-400 mt-2">
                    Current File: <a href="{{ route('downloads.show', basename($solution->file_path)) }}" target="_blank" class="hover:underline">{{ basename($solution->file_path) }}</a>
                </p>
            @endif
        </div>

        <div class="pt-4 flex gap-4">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded font-semibold transition">
                Save Changes
            </button>
            <a href="{{ route('tasks.show', $solution->task_id) }}" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-3 rounded font-semibold transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
