@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="space-y-6">
        {{-- Profile Info --}}
        <div class="p-6 bg-[#222] border border-gray-700 rounded-lg shadow">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Update Password --}}
        <div class="p-6 bg-[#222] border border-gray-700 rounded-lg shadow">
            @include('profile.partials.update-password-form')
        </div>

        {{-- Delete Account --}}
        <div class="p-6 bg-[#222] border border-gray-700 rounded-lg shadow">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
