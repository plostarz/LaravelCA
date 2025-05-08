@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="max-w-7xl mx-auto px-6 py-12 space-y-12">

    {{-- Hero Section --}}
    <div class="bg-red-600 text-white rounded-lg shadow-lg p-10 text-center">
        <h1 class="text-4xl font-extrabold mb-4 flex justify-center items-center gap-3">
            🏎️ Welcome to F1 Pulse
        </h1>
        <p class="text-lg max-w-2xl mx-auto">
            Your ultimate destination for live simulations, upcoming races, and everything Formula 1.
        </p>
    </div>

    {{-- Upcoming Race Countdown --}}
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
                class="w-full h-40 object-cover rounded shadow"
            >
        </div>
        @endif
    </div>
    @else
    <p class="text-center text-gray-500">No upcoming races found.</p>
    @endif

    {{-- Inline Countdown Script (UNTOUCHED) --}}
    <script>
        console.log('🏁 Countdown script starting');
        const target = new Date("{{ $nextRace?->date->format('Y-m-d') }}T00:00:00");
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
            tick();                 // initial render
            setInterval(tick, 1000); // update every second
        }
    </script>

    {{-- Race & Simulation Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-red-600 text-lg font-semibold">🔥 Next Race</h3>
            <p class="mt-2 text-2xl font-bold">{{ $nextRace->name ?? 'TBD' }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-red-600 text-lg font-semibold">🗓️ Total Races</h3>
            <p class="mt-2 text-2xl font-bold">{{ \App\Models\Race::count() }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-red-600 text-lg font-semibold">🏁 Simulations Run</h3>
            <p class="mt-2 text-2xl font-bold">{{ \App\Models\Simulation::count() }}</p>
        </div>
    </div>

    {{-- Highlight Video --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">🎥 Relive the Speed</h2>
        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/8zTzK9h5cEg"
                title="F1 Highlights" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>

    {{-- Call to Action --}}
    <div class="text-center mt-10">
        <a href="{{ route('simulations.create') }}"
           class="inline-block bg-red-600 hover:bg-red-700 text-white text-lg px-6 py-3 rounded shadow transition">
            🚦 Run a Simulation
        </a>
    </div>

</div>
@endsection
