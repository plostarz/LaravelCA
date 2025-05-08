@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/f1Theme.css') }}">

<div class="team-container px-6 py-12">
  <div class="flex justify-between items-center mb-8">
    <h1 class="section-title">F1 Teams</h1>
    <a href="{{ route('teams.create') }}" class="btn-add-driver flex items-center">
      <!-- Inline "+" SVG -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
      </svg>
      Add Team
    </a>
  </div>

  @if($teams->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach($teams as $team)
        <div 
          x-data="{ open: false, wins: '{{ $team->wins ?? 0 }}', drivers: {{ json_encode($team->drivers) }} }" 
          class="team-card bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 relative">

          <!-- Team Image -->
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

          <!-- Team Details -->
          <div class="p-4">
            <h3 class="text-xl font-bold text-red-600 mb-1">{{ $team->name }}</h3>
            <p class="text-sm text-gray-600"><strong>Base:</strong> {{ $team->base }}</p>
            <p class="text-sm text-gray-600"><strong>Principal:</strong> {{ $team->principal }}</p>
            <p class="text-sm text-gray-600"><strong>Founded:</strong> {{ $team->founded_year }}</p>
            <p class="text-sm text-gray-600"><strong>Drivers in DB:</strong> {{ $team->drivers_count }}</p>

            <div class="flex justify-between items-center mt-4">
              <a href="{{ route('teams.edit', $team) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
              <button @click="open = true" class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition">
                <!-- info icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 11-10 10A10 10 0 0112 2z" />
                </svg>
                Team Info
              </button>
            </div>
          </div>

          <!-- Modal Overlay -->
          <div x-cloak x-show.transition.opacity="open" @keydown.escape.window="open = false" class="fixed inset-0 bg-black bg-opacity-60 flex items-start justify-center overflow-y-auto z-50 py-10 px-4">
            <div @click.away="open = false" class="relative bg-white rounded-2xl shadow-xl max-w-lg w-full p-6 overflow-y-auto max-h-screen">

              <!-- Header -->
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-red-600">{{ $team->name }} Stats</h2>
                <button @click="open = false" class="text-gray-500 hover:text-gray-800 text-3xl leading-none ml-2">&times;</button>
              </div>

              <div class="space-y-4">
                <p class="text-lg"><strong>Total Wins:</strong> <span class="text-red-600" x-text="wins"></span></p>

                <div>
                  <p class="font-semibold mb-2">Drivers (all time):</p>
                  <ul class="max-h-60 overflow-y-auto space-y-1 pr-2">
                    <template x-for="driver in drivers" :key="driver">
                      <li class="text-gray-700 text-sm border-b border-gray-200 pb-1" x-text="driver"></li>
                    </template>
                    <template x-if="drivers.length === 0">
                      <li class="text-gray-500 italic">No drivers found</li>
                    </template>
                  </ul>
                </div>
              </div>

              <!-- Footer Close -->
              <div class="mt-6 text-right">
                <button @click="open = false" class="px-4 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition">Close</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <!-- Existing empty state -->
  @endif
</div>
@endsection
