@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto space-y-6">

  {{-- Race & Circuit Card --}}
  <div class="bg-white rounded-lg shadow overflow-hidden">
    @php
      $circuitImage = $simulation->race->circuit->image_path;
      // If it’s a full URL, use it; otherwise assume a storage path
      $imgSrc = Str::startsWith($circuitImage, ['http://','https://'])
                ? $circuitImage
                : asset('storage/'.$circuitImage);
    @endphp

    <img src="{{ $imgSrc }}"
         alt="{{ $simulation->race->circuit->name }} image"
         class="w-full h-64 object-cover">

    <div class="p-6">
      <h2 class="text-2xl font-bold">{{ $simulation->race->name }}</h2>
      <p class="text-gray-600">
        Circuit: {{ $simulation->race->circuit->name }} &mdash;
        {{ $simulation->race->date->format('F j, Y') }},
        {{ $simulation->race->season }} Season, Round {{ $simulation->race->round }}
      </p>
      <p class="mt-2 text-sm text-gray-500">
        Ran by: {{ $simulation->user->name }} on
        {{ $simulation->created_at->format('F j, Y \a\t H:i') }}
      </p>
    </div>
  </div>

  {{-- Leaderboard with Photos --}}
  <div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-4">Leaderboard</h3>
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-3 py-2 text-left">Pos</th>
          <th class="px-3 py-2 text-left">Driver</th>
          <th class="px-3 py-2 text-right">Total Time (s)</th>
          <th class="px-3 py-2 text-right">Avg Lap (s)</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach($results as $r)
        <tr>
          <td class="px-3 py-2">{{ $r['position'] }}</td>
          <td class="px-3 py-2 flex items-center space-x-2">
            @php
              $driver = \App\Models\Driver::where('name', $r['driver_name'])->first();
              $driverImg = $driver->image_path ?? null;
              $driverSrc = $driverImg && Str::startsWith($driverImg, ['http://','https://'])
                          ? $driverImg
                          : ($driverImg ? asset('storage/'.$driverImg) : null);
            @endphp
            @if($driverSrc)
              <img src="{{ $driverSrc }}"
                   alt="{{ $driver->name }} photo"
                   class="w-8 h-8 rounded-full object-cover">
            @endif
            <span>{{ $r['driver_name'] }}</span>
          </td>
          <td class="px-3 py-2 text-right">{{ $r['total_time'] }}</td>
          <td class="px-3 py-2 text-right">{{ $r['avg_lap'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Lap-time Chart --}}
  <div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-4">Lap-by-Lap Performance</h3>
    <canvas id="lapChart" height="200"></canvas>
  </div>

</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('lapChart').getContext('2d');
    const datasets = @json($chartData);
    datasets.forEach(ds => {
      const hue = Math.floor(Math.random()*360);
      ds.borderColor = `hsl(${hue}, 70%, 50%)`;
      ds.fill = false;
      ds.tension = 0.2;
    });
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: Array.from({length: datasets[0].data.length}, (_,i)=>i+1),
        datasets
      },
      options: {
        interaction: { mode: 'index', intersect: false },
        plugins: { title: { display: false } },
        scales: {
          x: { title: { display: true, text: 'Lap #' } },
          y: { title: { display: true, text: 'Time (s)' } }
        }
      }
    });
  });
</script>
@endsection
