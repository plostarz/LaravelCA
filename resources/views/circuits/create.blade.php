@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Add New Circuit</h2>
    <a 
      href="{{ route('circuits.index') }}" 
      class="px-4 py-2 bg-gray-600 text-red rounded hover:bg-gray-700 transition"
    >
      ← Back to Circuits
    </a>
  </div>

  @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
      <ul class="list-disc px-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('circuits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="name" class="block font-medium">Name</label>
      <input 
        type="text" name="name" id="name" 
        value="{{ old('name') }}" required
        class="w-full border rounded p-2"
      >
    </div>
    <div class="mb-4">
      <label for="location" class="block font-medium">Location</label>
      <input 
        type="text" name="location" id="location" 
        value="{{ old('location') }}" required
        class="w-full border rounded p-2"
      >
    </div>
    <div class="mb-4">
      <label for="country" class="block font-medium">Country</label>
      <input 
        type="text" name="country" id="country" 
        value="{{ old('country') }}" required
        class="w-full border rounded p-2"
      >
    </div>
    <div class="mb-4">
      <label for="length_km" class="block font-medium">Circuit Length (km)</label>
      <input 
        type="number" step="0.01" name="length_km" id="length_km" 
        value="{{ old('length_km') }}" required
        class="w-full border rounded p-2"
      >
    </div>
    <div class="mb-4">
      <label for="image" class="block font-medium">Circuit Image</label>
      <input 
        type="file" name="image" id="image" accept="image/*"
        class="w-full border rounded p-2"
      >
    </div>
    <button 
      type="submit" 
      class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition"
    >
      Add Circuit
    </button>
  </form>
</div>
@endsection
