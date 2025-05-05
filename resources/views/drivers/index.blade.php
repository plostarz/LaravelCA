@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
  <div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Drivers</h1>
    <a href="{{ route('drivers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Driver</a>
  </div>
  <table class="min-w-full divide-y divide-gray-200">
    <thead><tr>
      <th>Name</th><th>Nationality</th><th>Team</th><th>DOB</th><th>Photo</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @foreach($drivers as $driver)
      <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->nationality }}</td>
        <td>{{ $driver->team?->name }}</td>
        <td>{{ $driver->date_of_birth->format('Y-m-d') }}</td>
        <td>@if($driver->image_path)<img src="{{ asset('storage/'.$driver->image_path) }}" class="w-12 h-12 rounded">@endif</td>
        <td><a href="{{ route('drivers.edit',$driver) }}" class="text-indigo-600">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection