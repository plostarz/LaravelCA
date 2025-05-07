@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-red-600 flex items-center gap-3">
                🏎️ Race Simulations
            </h1>
            <p class="text-gray-600 mt-1 text-sm">Explore past F1 simulation results and relive the action!</p>
        </div>
        <a href="{{ route('simulations.create') }}"
           class="mt-4 md:mt-0 inline-flex items-center bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded shadow transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>
            Run New Simulation
        </a>
    </div>

    {{-- Simulation Table --}}
    <div class="overflow-x-auto bg-white rounded shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">User</th>
                    <th class="px-6 py-3 text-left">Race</th>
                    <th class="px-6 py-3 text-left">Date</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($simulations as $sim)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">{{ $sim->user->name }}</td>
                        <td class="px-6 py-4">{{ $sim->race->name }}</td>
                        <td class="px-6 py-4">{{ $sim->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('simulations.show', $sim) }}"
                               class="text-indigo-600 hover:underline flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Race Footage Section --}}
   {{-- Race Footage Section --}}
<div class="mt-12">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">🏁 Relive the Action</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
          <iframe class="w-full h-full" src="https://youtu.be/IHE4-8uoT5E?si=gUZ0mRBzWDbfeLyY"
                  title="F1 2023 Highlights" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
      </div>
      <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
          <iframe class="w-full h-full" src="https://youtu.be/zacKiHlYQEU?si=XB5jHzJd2cQQwqUq"
                  title="F1 Simulation Footage" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
      </div>
  </div>
</div>

    </div>

</div>
@endsection
