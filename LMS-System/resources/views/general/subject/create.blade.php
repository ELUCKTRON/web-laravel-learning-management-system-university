@extends("layouts.main")

@section("title", Auth::user()->role === 'teacher' ? 'Create Subject' : 'Enroll in Subject')

@section("content")
    <div class="bg-[#181818] rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-white mb-6">
            {{ Auth::user()->role === 'teacher' ? 'Create a New Subject' : 'Enroll in a Subject' }}
        </h2>

        <form action="{{ route('subjects.store') }}" method="POST" class="space-y-6">
            @csrf

            @if(Auth::user()->role === 'teacher')
                {{-- Teacher Form --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-300 mb-1">Subject Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name','') }}"
                        placeholder="e.g., Web Development"
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
                        placeholder="Short summary of the subject..."
                        class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    >{{ old('description','') }}</textarea>
                </div>

                <div>
                    <label for="credit" class="block text-sm font-semibold text-gray-300 mb-1">Credit</label>
                    <input
                        type="number"
                        id="credit"
                        name="credit"
                        min="1"
                        max="5"
                        value="{{ old('credit','') }}"
                        placeholder="between 1-5 , e.g., 5 "
                        class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2
                            @error('credit') border border-red-500 focus:ring-red-500 @else focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @enderror"
                    >
                    @error('credit')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @else
                {{-- Student Form --}}
                <div>
                    <label for="subject_id" class="block text-sm font-semibold text-gray-300 mb-1">Select Subject</label>
                    <select
                        name="subject_id"
                        id="subject_id"
                        class="w-full p-3 rounded bg-[#222222] text-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    >
                        <option value="">-- Choose a subject --</option>
                        @foreach($allSubjects as $subject)
                            <option value="{{ $subject->id }}">
                                {{ $subject->name }} ({{ $subject->credit }} credit)
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="pt-4">
                <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 font-semibold transition">
                    {{ Auth::user()->role === 'teacher' ? 'Create Subject' : 'Enroll' }}
                </button>
                <a href="{{ route('subjects.index') }}" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
