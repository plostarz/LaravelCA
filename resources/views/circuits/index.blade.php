@extends('layouts.app')

@section('content')
<div class="relative min-h-screen font-sans bg-gray-900">

  {{-- Softer fullscreen background --}}
  <div 
    class="absolute inset-0 bg-cover bg-center z-0" 
    style="
      background-image: url('https://regiodeco.com/wp-content/uploads/sites/80/2024/04/ead88ffe-75c1-4838-8bf7-321112f90d5e.jpg');
      filter: brightness(0.75) blur(1px);
    "
  ></div>

  {{-- Content --}}
  <div class="relative z-10 max-w-7xl mx-auto px-6 py-12 space-y-8">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <h1 class="text-5xl font-extrabold text-red-600 flex items-center gap-3">
        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
          <path d="M21 7L9 19l-5-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        F1 Circuits
      </h1>
      <a 
        href="{{ route('circuits.create') }}" 
        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-full shadow-lg transition transform hover:scale-105"
      >
        + New Circuit
      </a>
    </div>

    {{-- Cards grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($circuits as $c)
      <div class="relative bg-white/20 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden 
                  transition transform hover:-translate-y-1 hover:shadow-2xl duration-300">
        {{-- Body --}}
        <div class="p-6 space-y-3">
          {{-- Title with flag icon --}}
          <h2 class="text-2xl font-bold text-red-600 flex items-center gap-2">
            <span class="text-xl">🏁</span>
            {{ $c->name }}
          </h2>

          {{-- Location & country --}}
          <p class="text-red-500 flex items-center gap-2">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M17.657 16.657L13.414 12.414a2 2 0 00-2.828 0L6.343 16.657M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            {{ $c->location }}, {{ $c->country }}
          </p>

          {{-- Length badge --}}
          <span class="inline-block bg-red-600 bg-opacity-30 text-red-600 text-sm font-medium px-3 py-1 rounded-full">
            {{ number_format($c->length_km, 3) }} km
          </span>

          {{-- Actions --}}
          <div class="flex justify-end space-x-4 mt-4">
            <a 
              href="{{ route('circuits.show', $c) }}"
              class="inline-flex items-center gap-1 text-red-600 hover:text-red-400 font-semibold"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 9H9V5h2v6z"/>
              </svg>
              View
            </a>
            <a 
              href="{{ route('circuits.edit', $c) }}"
              class="inline-flex items-center gap-1 text-red-600 hover:text-red-400 font-semibold"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M17.414 2.586a2 2 0 010 2.828l-8.828 8.828a1 1 0 01-.464.263l-4 1a1 1 0 01-1.213-1.213l1-4a1 1 0 01.263-.464l8.828-8.828a2 2 0 012.828 0z"/>
              </svg>
              Edit
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Empty state --}}
    @if($circuits->isEmpty())
      <div class="text-center mt-20 text-red-600 space-y-4">
        <p class="text-2xl font-semibold">No circuits yet.</p>
        <a 
          href="{{ route('circuits.create') }}"
          class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white 
                 font-bold py-2 px-4 rounded-full shadow transition"
        >
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 5v10m5-5H5"/>
          </svg>
          Add your first circuit
        </a>
      </div>
    @endif
  </div>
</div>
@endsection
