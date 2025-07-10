@extends("layouts.main")

@section("title", "Edit Subject")

@section("content")
    <div class="bg-[#181818] rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-white mb-6">Edit Subject</h2>

        <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-300 mb-1">Subject Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $subject->name) }}"
                    placeholder="e.g., Web Development"
                    class="w-full p-3 rounded bg-[#222222] text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
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
                    class="w-full p-3 rounded bg-[#222222] text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                >{{ old('description', $subject->description) }}</textarea>
            </div>

            <div>
                <label for="credit" class="block text-sm font-semibold text-gray-300 mb-1">Credit</label>
                <input
                    type="number"
                    id="credit"
                    name="credit"
                    min="1"
                    max="5"
                    value="{{ old('credit', $subject->credit) }}"
                    class="w-full p-3 rounded bg-[#222222] text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                >
                @error('credit')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex gap-4">
                <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 font-semibold transition">
                    Update Subject
                </button>
                <a href="{{ route('subjects.index') }}" class="bg-gray-700 text-white px-6 py-3 rounded hover:bg-gray-600 font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
