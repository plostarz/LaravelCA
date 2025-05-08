@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-gray-900 font-serif">

  {{-- Background --}}
  <div 
    class="absolute inset-0 bg-cover bg-center opacity-30" 
    style="background-image: url('https://wallpapercave.com/wp/wp8757632.jpg');"
  ></div>

  {{-- Content --}}
  <div class="relative z-10 max-w-3xl mx-auto px-6 py-24 space-y-20 text-red-200">

    {{-- Hero --}}
    <header class="text-center space-y-4">
      <h1 class="text-5xl font-bold text-red-500">About F1Trackr</h1>
      <p class="text-lg leading-relaxed font-bold">
        F1Trackr is the ultimate destination for true Formula 1 enthusiasts—sleek, lightning-fast, and packed with everything you need to live and breathe the Grand Prix life.
      </p>
    </header>

    {{-- Our Mission --}}
    <section class="space-y-4">
      <h2 class="text-3xl font-semibold text-red-400 border-b border-red-400 pb-2 flex items-center gap-2">
        <svg class="w-8 h-8 text-red-400" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01z"/>
        </svg>
        Our Mission
      </h2>
      <ul class="space-y-3 font-bold">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9 2l1 2h2l1-2h3l-2.5 5 2.5 5h-3l-1-2H10l-1 2H6l2.5-5L6 2h3z"/>
          </svg>
          Deliver live timing, sector splits, and race control updates in real time—so you never miss a single lap.
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v12l4-4h8a2 2 0 002-2V5a2 2 0 00-2-2H5z"/>
          </svg>
          Showcase high-res circuit maps and corner-by-corner insights for every track on the calendar.
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 3a2 2 0 00-2 2v12l4-4h8a2 2 0 002-2V5a2 2 0 00-2-2H5z"/>
            <path d="M8 9a1 1 0 110 2h4a1 1 0 110-2H8z"/>
          </svg>
          Provide a curated history of epic races—legendary battles, championship deciders, and unforgettable moments.
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z"/>
          </svg>
          Offer exclusive fan content—podcasts, driver profiles, and behind-the-scenes tech breakdowns.
        </li>
      </ul>
    </section>

    {{-- What Is Formula 1 --}}
    <section class="space-y-4">
      <h2 class="text-3xl font-semibold text-red-400 border-b border-red-400 pb-2">What Is Formula 1?</h2>
      <p class="leading-relaxed font-bold">
        Formula 1 is the pinnacle of global motorsport: a blend of blistering speed, cutting-edge technology, and world-class drivers. Each season spans iconic circuits—from Monaco’s glamorous streets to Abu Dhabi’s Yas Marina—bringing fans together in pursuit of the checkered flag.
      </p>
    </section>

    {{-- Meet the Team --}}
    <section class="space-y-4">
      <h2 class="text-3xl font-semibold text-red-400 border-b border-red-400 pb-2">Meet the Team</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
        <div class="space-y-1">
          <p class="text-xl font-semibold text-red-300">Innocencia</p>
          <p class="font-bold">Founder &amp; F1 Enthusiast</p>
        </div>
        <div class="space-y-1">
          <p class="text-xl font-semibold text-red-300">Diana Aboa</p>
          <p class="font-bold">Design &amp; Fan Engagement</p>
        </div>
      </div>
    </section>

    {{-- Call to Action --}}
    <footer class="text-center pt-6">
      <a 
        href="{{ route('circuits.index') }}" 
        class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transition"
      >
        Dive Into Circuits →
      </a>
    </footer>

  </div>
</div>
@endsection
