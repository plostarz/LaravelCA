@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl">Run New Simulation</h2>
  <form action="{{ route('simulations.store') }}" method="POST">
    @csrf
    <div class="mb-4">
      <label>Race</label>
      <select name="race_id" class="w-full border p-2">
        @foreach($races as $id=>$name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-4">
      <label>Parameters (JSON)</label>
      <textarea name="parameters" class="w-full border p-2" rows="4">{{ old('parameters') }}</textarea>
    </div>
    <button class="bg-green-600 text-white px-4 py-2 rounded">Run</button>
  </form>
</div>
@endsection