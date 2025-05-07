@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl mb-4">Simulation Details</h2>

  <p><strong>User:</strong> {{ $simulation->user->name }}</p>
  <p><strong>Race:</strong> {{ $simulation->race->name }}</p>

  <h3 class="mt-6 mb-2 text-lg font-semibold">Parameters</h3>
  <pre class="bg-gray-100 p-4 rounded">{{ $simulation->parameters }}</pre>

  <h3 class="mt-6 mb-2 text-lg font-semibold">Results — Leaderboard</h3>
  <table class="min-w-full mb-4 divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-2 text-left">Pos</th>
        <th class="px-4 py-2 text-left">Driver</th>
        <th class="px-4 py-2 text-right">Total Time (s)</th>
        <th class="px-4 py-2 text-right">Avg Lap (s)</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach(json_decode($simulation->results, true) as $r)
        <tr>
          <td class="px-4 py-2">{{ $r['position'] }}</td>
          <td class="px-4 py-2">{{ $r['driver_name'] }}</td>
          <td class="px-4 py-2 text-right">{{ $r['total_time'] }}</td>
          <td class="px-4 py-2 text-right">{{ $r['avg_lap'] }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <details class="mt-4">
    <summary class="cursor-pointer font-medium">Show Lap-by-Lap Times</summary>
    <div class="mt-2 space-y-4">
      @foreach(json_decode($simulation->results, true) as $r)
        <div>
          <p class="font-semibold">{{ $r['driver_name'] }}:</p>
          <p class="text-sm leading-tight">{{ implode(' | ', $r['laps']) }}</p>
        </div>
      @endforeach
    </div>
  </details>

  <p class="mt-6 text-gray-600">
    <strong>Ran at:</strong> {{ $simulation->created_at->format('Y-m-d H:i') }}
  </p>
</div>
@endsection
