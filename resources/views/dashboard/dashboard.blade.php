@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="max-w-4xl mx-auto p-6 space-y-6">
  @if($nextRace)
    <div class="bg-white rounded-lg shadow p-6 flex flex-col md:flex-row md:items-center md:space-x-6">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-red-600">{{ $nextRace->name }}</h2>
        <p class="text-gray-600">
          {{ $nextRace->date->format('F j, Y') }} — Round {{ $nextRace->round }}
        </p>
        <p class="mt-4">
          Next GP starts in:
          <span id="next-countdown" class="font-mono text-xl text-gray-800">
            Loading…
          </span>
        </p>
      </div>

      @php
        $img = $nextRace->circuit->image_path;
        $src = $img && Str::startsWith($img, ['http://','https://'])
               ? $img
               : ($img ? asset('storage/'.$img) : null);
      @endphp
      @if($src)
        <div class="mt-6 md:mt-0 w-full md:w-1/3">
          <img 
            src="{{ $src }}" 
            alt="{{ $nextRace->circuit->name }} image"
            class="w-full h-32 object-cover rounded"
          >
        </div>
      @endif
    </div>

    {{-- inline timer script --}}
    <script>
      console.log('🏁 Countdown script starting');
      const target = new Date("{{ $nextRace->date->format('Y-m-d') }}T00:00:00");
      const el     = document.getElementById('next-countdown');
      if (!el) {
        console.error('❌ #next-countdown not found');
      } else {
        console.log('✅ #next-countdown found:', el, 'target:', target);
        function tick() {
          const now = new Date();
          let diff = Math.floor((target - now) / 1000);
          if (diff < 0) diff = 0;

          const h = Math.floor(diff/3600);
          const m = Math.floor((diff%3600)/60);
          const s = diff%60;
          el.textContent = `${h}h ${m}m ${s}s`;
        }
        tick();                 // initial
        setInterval(tick,1000); // every second
      }
    </script>
  @else
    <p class="text-center text-gray-500">No upcoming races found.</p>
  @endif
</div>
@endsection
