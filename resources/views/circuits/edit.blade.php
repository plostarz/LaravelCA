@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
  <h2 class="text-2xl font-semibold mb-4">Edit Circuit</h2>

  @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
      <ul class="list-disc px-5">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('circuits.update', $circuit) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-4">
      <label for="name" class="block font-medium">Name</label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $circuit->name) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="location" class="block font-medium">Location</label>
      <input
        type="text"
        name="location"
        id="location"
        value="{{ old('location', $circuit->location) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="country" class="block font-medium">Country</label>
      <input
        type="text"
        name="country"
        id="country"
        value="{{ old('country', $circuit->country) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="length_km" class="block font-medium">Length (km)</label>
      <input
        type="number"
        step="0.001"
        name="length_km"
        id="length_km"
        value="{{ old('length_km', $circuit->length_km) }}"
        class="w-full border rounded p-2"
        required
      >
    </div>

    <div class="mb-4">
      <label for="image_path" class="block font-medium">Image URL</label>
      <input
        type="url"
        name="image_path"
        id="image_path"
        value="{{ old('image_path', $circuit->image_path) }}"
        placeholder="https://example.com/track.jpg"
        class="w-full border rounded p-2"
      >
      <p class="text-sm text-gray-500 mt-1">Paste any public image link here.</p>
    </div>

    <div class="flex justify-end space-x-2">
      <a
        href="{{ route('circuits.index') }}"
        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition"
      >
        Cancel
      </a>
      <button
        type="submit"
        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition"
      >
        Save Changes
      </button>
    </div>
  </form>
</div>
@endsection
