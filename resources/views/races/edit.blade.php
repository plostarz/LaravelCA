@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
  <h2 class="text-2xl font-semibold mb-4">Edit Race</h2>

  @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('races.update', $race) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-4">
      <label for="name" class="block font-medium">Race Name</label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $race->name) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="date" class="block font-medium">Date</label>
      <input
        type="date"
        name="date"
        id="date"
        value="{{ old('date', $race->date->format('Y-m-d')) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="circuit_id" class="block font-medium">Circuit</label>
      <select
        name="circuit_id"
        id="circuit_id"
        class="w-full border rounded p-2"
        required
      >
        @foreach($circuits as $id => $name)
          <option
            value="{{ $id }}"
            {{ old('circuit_id', $race->circuit_id) == $id ? 'selected' : '' }}
          >
            {{ $name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label for="season" class="block font-medium">Season (Year)</label>
      <input
        type="number"
        name="season"
        id="season"
        min="1950"
        max="{{ date('Y')+1 }}"
        value="{{ old('season', $race->season) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="round" class="block font-medium">Round</label>
      <input
        type="number"
        name="round"
        id="round"
        min="1"
        value="{{ old('round', $race->round) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="flex justify-end space-x-2">
      <a
        href="{{ route('races.index') }}"
        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition"
      >
        Cancel
      </a>
      <button
        type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
      >
        Save Changes
      </button>
    </div>
  </form>
</div>
@endsection
