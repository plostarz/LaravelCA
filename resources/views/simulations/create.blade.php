@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl mb-4">Run New Simulation</h2>

  <form action="{{ route('simulations.store') }}" method="POST">
    @csrf

    <div class="mb-4">
      <label class="block font-medium">Race</label>
      <select name="race_id" class="w-full border p-2">
        @foreach($races as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label class="block font-medium">Weather</label>
      <select name="parameters[weather]" class="w-full border p-2">
        <option value="dry">Dry</option>
        <option value="wet">Wet</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block font-medium">Number of Laps</label>
      <input type="number" name="parameters[lap_count]" value="60"
             class="w-full border p-2" min="1" max="200">
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
      Run Simulation
    </button>
  </form>
</div>
@endsection
