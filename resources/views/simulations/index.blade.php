@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
  <div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Simulations</h1>
    <a href="{{ route('simulations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Run Simulation</a>
  </div>
  <table class="min-w-full divide-y divide-gray-200">
    <thead><tr>
      <th>User</th><th>Race</th><th>Date</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @foreach($simulations as $sim)
      <tr>
        <td>{{ $sim->user->name }}</td>
        <td>{{ $sim->race->name }}</td>
        <td>{{ $sim->created_at->format('Y-m-d H:i') }}</td>
        <td><a href="{{ route('simulations.show',$sim) }}" class="text-indigo-600">View</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection