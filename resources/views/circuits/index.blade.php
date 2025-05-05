@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold">Circuits</h1>
    <a 
      href="{{ route('circuits.create') }}" 
      class="px-4 py-2 bg-blue-600 text-blue rounded hover:bg-blue-700 transition"
    >
      + Add Circuit
    </a>
  </div>

  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach($circuits as $circuit)
        <tr>
          <td class="px-6 py-4">{{ $circuit->name }}</td>
          <td class="px-6 py-4">{{ $circuit->location }}, {{ $circuit->country }}</td>
          <td class="px-6 py-4 text-right">
            <a 
              href="{{ route('circuits.show', $circuit) }}" 
              class="text-indigo-600 hover:text-indigo-900"
            >
              View
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
