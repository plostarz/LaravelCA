@php
    // In create view we may not pass a $driver – default it to null
    $driver = $driver ?? null;
@endphp

<div class="mb-4">
  <label for="name" class="block text-white mb-1">Name</label>
  <input
    type="text"
    name="name"
    id="name"
    value="{{ old('name', $driver->name ?? '') }}"
    class="w-full border border-gray-300 rounded px-3 py-2 {{ $inputClass ?? '' }}"
  >
</div>

<div class="mb-4">
  <label for="nationality" class="block text-white mb-1">Nationality</label>
  <input
    type="text"
    name="nationality"
    id="nationality"
    value="{{ old('nationality', $driver->nationality ?? '') }}"
    class="w-full border border-gray-300 rounded px-3 py-2 {{ $inputClass ?? '' }}"
  >
</div>

<div class="mb-4">
  <label for="team_id" class="block text-white mb-1">Team</label>
  <select
    name="team_id"
    id="team_id"
    class="w-full border border-gray-300 rounded px-3 py-2 {{ $inputClass ?? '' }}"
  >
    <option value="">-- None --</option>
    @foreach($teams as $id => $name)
      <option
        value="{{ $id }}"
        {{ old('team_id', $driver->team_id ?? '') == $id ? 'selected' : '' }}
      >
        {{ $name }}
      </option>
    @endforeach
  </select>
</div>

<div class="mb-4">
  <label for="date_of_birth" class="block text-white mb-1">Date of Birth</label>
  <input
    type="date"
    name="date_of_birth"
    id="date_of_birth"
    value="{{ old('date_of_birth', $driver->date_of_birth ?? '') }}"
    class="w-full border border-gray-300 rounded px-3 py-2 {{ $inputClass ?? '' }}"
  >
</div>

<div class="mb-4">
  <label for="image" class="block text-white mb-1">Photo</label>
  <input
    type="file"
    name="image"
    id="image"
    accept="image/*"
    class="w-full border border-gray-300 rounded px-3 py-2 {{ $inputClass ?? '' }}"
  >
</div>
