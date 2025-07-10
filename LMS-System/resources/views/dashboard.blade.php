@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-[#222] text-gray-300 p-6 rounded-lg border border-gray-700 shadow mb-8">
        <h2 class="text-2xl font-bold text-white mb-2">Welcome back, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-400">{{ __("You're logged in to your dashboard.") }}</p>
    </div>

    @if(Auth::user()->role === 'teacher')
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-orange-400 mb-4">Teacher Panel</h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('subjects.index') }}" class="block bg-[#181818] border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg hover:border-orange-500 transition">
                    <h4 class="text-lg font-semibold text-white mb-2">Manage Subjects</h4>
                    <p class="text-sm text-gray-400">Add or edit your subjects and materials.</p>
                </a>
                <a href="#" class="block bg-[#181818] border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg hover:border-orange-500 transition">
                    <h4 class="text-lg font-semibold text-white mb-2">Review Submissions</h4>
                    <p class="text-sm text-gray-400">View and grade student submissions.</p>
                </a>
                <a href="#" class="block bg-[#181818] border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg hover:border-orange-500 transition">
                    <h4 class="text-lg font-semibold text-white mb-2">Performance Stats</h4>
                    <p class="text-sm text-gray-400">See how your students are doing.</p>
                </a>
            </div>
        </div>
    @else
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-orange-400 mb-4">Student Tools</h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('subjects.index') }}" class="block bg-[#181818] border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg hover:border-orange-500 transition">
                    <h4 class="text-lg font-semibold text-white mb-2">Your Subjects</h4>
                    <p class="text-sm text-gray-400">View all the subjects you’re enrolled in.</p>
                </a>
                <a href="#" class="block bg-[#181818] border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg hover:border-orange-500 transition">
                    <h4 class="text-lg font-semibold text-white mb-2">Tasks & Deadlines</h4>
                    <p class="text-sm text-gray-400">Track your tasks and due dates.</p>
                </a>
                <a href="#" class="block bg-[#181818] border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg hover:border-orange-500 transition">
                    <h4 class="text-lg font-semibold text-white mb-2">Progress</h4>
                    <p class="text-sm text-gray-400">Monitor your academic performance.</p>
                </a>
            </div>
        </div>
    @endif
@endsection
