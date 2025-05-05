@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
  <div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Races</h1>
    <a href="{{ route('races.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Race</a>
  </div>
  <table class="min-w-full divide-y divide-gray-200">
    <thead><tr>
      <th>Name</th><th>Date</th><th>Circuit</th><th>Season</th><th>Round</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @foreach($races as $race)
      <tr>
        <td>{{ $race->name }}</td>
        <td>{{ $race->date->format('Y-m-d') }}</td>
        <td>{{ $race->circuit->name }}</td>
        <td>{{ $race->season }}</td>
        <td>{{ $race->round }}</td>
        <td><a href="{{ route('races.edit',$race) }}" class="text-indigo-600">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection