@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl">Add Race</h2>
  <form action="{{ route('races.store') }}" method="POST">
    @csrf
    <div class="mb-4">
      <label>Name</label>
      <input name="name" value="{{ old('name') }}" class="w-full border p-2">
    </div>
    <div class="mb-4">
      <label>Date</label>
      <input type="date" name="date" value="{{ old('date') }}" class="w-full border p-2">
    </div>
    <div class="mb-4">
      <label>Circuit</label>
      <select name="circuit_id" class="w-full border p-2">
        @foreach($circuits as $id=>$name)
          <option value="{{ $id }}" {{ old('circuit_id')==$id?'selected':'' }}>{{ $name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-4">
      <label>Season</label>
      <input type="number" name="season" value="{{ old('season') }}" class="w-full border p-2">
    </div>
    <div class="mb-4">
      <label>Round</label>
      <input type="number" name="round" value="{{ old('round') }}" class="w-full border p-2">
    </div>
    <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Save Race</button>
  </form>
</div>
@endsection