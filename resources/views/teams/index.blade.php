@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
  <div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Teams</h1>
    <a href="{{ route('teams.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Team</a>
  </div>
  <table class="min-w-full divide-y divide-gray-200">
    <thead><tr>
      <th>Name</th><th>Base</th><th>Principal</th><th>Founded</th><th>Drivers Count</th><th>Photo</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @foreach($teams as $team)
      <tr>
        <td>{{ $team->name }}</td>
        <td>{{ $team->base }}</td>
        <td>{{ $team->principal }}</td>
        <td>{{ $team->founded_year }}</td>
        <td>{{ $team->drivers_count }}</td>
        <td>@if($team->image_path)<img src="{{ asset('storage/'.$team->image_path) }}" class="w-12 h-12 rounded">@endif</td>
        <td><a href="{{ route('teams.edit',$team) }}" class="text-indigo-600">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection