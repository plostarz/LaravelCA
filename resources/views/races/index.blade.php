@extends('layouts.app')
@section('content')

{{-- Chequered-flag subtle background --}}
<div class="relative overflow-hidden">
  <svg class="absolute inset-0 w-full h-full opacity-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 600 600">
    <defs>
      <pattern id="cheq" width="40" height="40" patternUnits="userSpaceOnUse">
        <rect width="20" height="20" fill="#000"/>
        <rect x="20" y="20" width="20" height="20" fill="#000"/>
      </pattern>
    </defs>
    <rect width="600" height="600" fill="url(#cheq)"/>
  </svg>

  <div class="relative max-w-7xl mx-auto px-6 py-10 space-y-8">
 {{-- Header --}}
<div class="flex items-center justify-between">
  <h1 class="text-3xl font-extrabold text-red-600 flex items-center space-x-2">
    {{-- cute checkered flag icon --}}
    <svg class="w-8 h-8 text-red-600 animate-pulse" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M2 3v17l3-3 4 4 4-4 4 4 4-4V3l-4 4-4-4-4 4-4-4z" />
      <path fill="#fff" d="M5 3l4 4-4 4V3zm8 0l4 4-4 4V3z" />
    </svg>
    <span>Grand Prix Races</span>
  </h1>
  <a href="{{ route('races.create') }}"
     class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-3 rounded shadow transition">
    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 010-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
    </svg>
    Add New Race
  </a>
</div>

    {{-- Grid of cards: 1 col on mobile, 2 on md, 3 on lg --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @forelse($races as $race)
        <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-lg shadow-lg overflow-hidden border-t-4 border-red-600 group hover:shadow-2xl transition">
          <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800">{{ $race->name }}</h2>
            <p class="text-sm text-gray-600 uppercase">{{ $race->circuit->name }}</p>
            <div class="mt-4 text-gray-700 space-y-2">
              <p><span class="font-semibold">Date:</span> {{ $race->date->format('F j, Y') }}</p>
              <p><span class="font-semibold">Season:</span> {{ $race->season }}</p>
              <p><span class="font-semibold">Round:</span> {{ $race->round }}</p>
            </div>
          </div>
          <div class="bg-red-600 text-white text-center py-3 group-hover:bg-red-700 transition">
            <a href="{{ route('races.edit', $race) }}" class="inline-flex items-center space-x-2">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
              </svg>
              <span>Edit</span>
            </a>
          </div>
        </div>
      @empty
        <div class="col-span-full text-center text-gray-500 py-12">
          No races yet. <a href="{{ route('races.create') }}" class="text-red-600 hover:underline">Add your first race</a>.
        </div>
      @endforelse
    </div>
  </div>
</div>

@endsection
