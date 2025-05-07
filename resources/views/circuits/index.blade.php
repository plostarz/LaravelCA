@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-6">

  {{-- Header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold text-red-600">🏁 F1 Circuits</h1>
    <a 
      href="{{ route('circuits.create') }}" 
      class="px-4 py-2 bg-red-600 text-white rounded shadow hover:bg-red-700 transition"
    >
      + Add New Circuit
    </a>
  </div>

  {{-- Grid of cards --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($circuits as $circuit)
      <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
        @if($circuit->image_path)
          <img 
            src="{{ $circuit->image_path }}" 
            alt="{{ $circuit->name }}" 
            class="w-full h-40 object-cover"
          >
        @else
          <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">
            No Image
          </div>
        @endif

        <div class="p-4">
          <h2 class="text-xl font-semibold text-gray-800">{{ $circuit->name }}</h2>
          <p class="text-gray-600">{{ $circuit->location }}, {{ $circuit->country }}</p>
          <div class="mt-4 flex justify-between items-center">
            <div class="space-x-4">
              <a 
                href="{{ route('circuits.show', $circuit) }}" 
                class="text-red-600 font-medium hover:underline"
              >
                View →
              </a>
              <a 
                href="{{ route('circuits.edit', $circuit) }}" 
                class="text-blue-600 font-medium hover:underline"
              >
                Edit ✎
              </a>
            </div>
            <span class="text-sm text-gray-500">{{ number_format($circuit->length_km, 3) }} km</span>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if($circuits->isEmpty())
    <p class="text-center text-gray-500 mt-12">
      No circuits yet. <a href="{{ route('circuits.create') }}" class="text-red-600 hover:underline">Add your first circuit</a>.
    </p>
  @endif

</div>
@endsection
