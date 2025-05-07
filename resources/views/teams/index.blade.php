@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/f1Theme.css') }}">

<div class="team-container">
    <div class="flex justify-between items-center mb-8">
        <h1 class="section-title">F1 Teams</h1>
        <a href="{{ route('teams.create') }}" class="btn-add-driver">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add Team
        </a>
    </div>

    @if(count($teams) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($teams as $team)
        <div class="team-card bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
            <div class="team-img-container bg-black flex justify-center items-center p-4">
                @php
                    $url = $team->image_path;
                    $src = $url && Str::startsWith($url, ['http://','https://'])
                           ? $url
                           : ($url ? asset('storage/'.$url) : null);
                @endphp
                @if($src)
                    <img src="{{ $src }}" alt="{{ $team->name }} logo" class="h-20 object-contain">
                @else
                    <div class="w-20 h-20 bg-gray-300 flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z" />
                        </svg>
                    </div>
                @endif
            </div>
            <div class="p-4">
                <h3 class="text-xl font-bold text-red-600 mb-1">{{ $team->name }}</h3>
                <p class="text-sm text-gray-600 mb-1"><strong>Base:</strong> {{ $team->base }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Principal:</strong> {{ $team->principal }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Founded:</strong> {{ $team->founded_year }}</p>
                <p class="text-sm text-gray-600 mb-3"><strong>Drivers:</strong> {{ $team->drivers_count }}</p>
                
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('teams.edit', $team) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a5 5 0 00-10 0v2m10 0a3 3 0 013 3v4a3 3 0 01-3 3H7a3 3 0 01-3-3v-4a3 3 0 013-3m10 0H7" />
                        </svg>
                        Team Info
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <div class="empty-state mt-12">
            <div class="empty-img">
                <img src="{{ asset('images/flag.svg') }}" alt="Checkered flag" class="h-24 mx-auto">
            </div>
            <h3 class="empty-title text-2xl mt-4">No teams found</h3>
            <p class="empty-message text-gray-600">Time to build your championship-winning F1 team!</p>
            <a href="{{ route('teams.create') }}" class="btn-add-driver mt-4">
                Add Your First Team
            </a>
        </div>
    @endif
</div>
@endsection
