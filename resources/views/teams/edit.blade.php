@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
  <h2 class="text-2xl font-semibold mb-4">Edit Team</h2>

  @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('teams.update',$team) }}" method="POST">
    @csrf @method('PATCH')

    <div class="mb-4">
      <label class="block font-medium">Name</label>
      <input name="name" value="{{ old('name',$team->name) }}"
             class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
      <label class="block font-medium">Base</label>
      <input name="base" value="{{ old('base',$team->base) }}"
             class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
      <label class="block font-medium">Principal</label>
      <input name="principal" value="{{ old('principal',$team->principal) }}"
             class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
      <label class="block font-medium">Founded Year</label>
      <input type="number" name="founded_year" value="{{ old('founded_year',$team->founded_year) }}"
             class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
      <label class="block font-medium">Photo URL</label>
      <input type="url" name="image_path" value="{{ old('image_path',$team->image_path) }}"
             placeholder="https://..." class="w-full border rounded p-2">
      <p class="text-sm text-gray-500 mt-1">
        Paste an external image link here.
      </p>
    </div>

    <div class="flex justify-end space-x-2">
      <a href="{{ route('teams.index') }}"
         class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
        Cancel
      </a>
      <button type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Save Changes
      </button>
    </div>
  </form>
</div>
@endsection
