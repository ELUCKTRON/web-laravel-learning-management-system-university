@extends("layouts.main")

@section("content")
            <div class="bg-[#181818] rounded-lg shadow-lg p-8 grid md:grid-cols-2 gap-8 items-center">

                <div class="flex justify-center">
                    <img src="{{ asset('images/lms.webp') }}" alt="LMS Image" class="rounded-md shadow max-w-sm">
                </div>


                <div class="bg-[#222222] rounded-md p-6">
                    <h2 class="text-4xl font-bold mb-6 text-white">Your All-in-One Learning Platform</h2>
                    <p class="text-lg leading-relaxed">
                        Welcome to <span class="font-bold text-orange-500">ClassHub</span>, the ultimate platform for students and teachers to collaborate, manage tasks, and stay organized. Teachers can create subjects, assign tasks, and evaluate student submissions. Students can take subjects, view assignments, and submit their solutions — all in one place.
                    </p>
                    <p class="mt-6 text-lg">
                        Whether you're a teacher or a student, <span class="font-semibold text-orange-400">ClassHub</span> makes learning management seamless, efficient, and fun.
                    </p>
                </div>
            </div>
@endsection
