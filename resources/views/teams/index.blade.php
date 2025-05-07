@extends('layouts.app')
@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
  <div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Teams</h1>
    <a href="{{ route('teams.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
      + Add Team
    </a>
  </div>
  <table class="min-w-full divide-y divide-gray-200">
    <thead><tr>
      <th>Name</th><th>Base</th><th>Principal</th>
      <th>Founded</th><th>Drivers</th><th>Photo</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @foreach($teams as $team)
      <tr>
        <td>{{ $team->name }}</td>
        <td>{{ $team->base }}</td>
        <td>{{ $team->principal }}</td>
        <td>{{ $team->founded_year }}</td>
        <td>{{ $team->drivers_count }}</td>
        <td>
          @php
            $url = $team->image_path;
            $src = $url && Str::startsWith($url, ['http://','https://'])
                   ? $url
                   : ($url ? asset('storage/'.$url) : null);
          @endphp
        
          @if($src)
            <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
              <img 
                src="{{ $src }}" 
                alt="{{ $team->name }} logo"
                class="object-contain w-full h-full"
              >
            </div>
          @else
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs">
              No Logo
            </div>
          @endif
        </td>
        
        <td>
          <a href="{{ route('teams.edit',$team) }}" class="text-indigo-600 hover:underline">
                    Edit
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
