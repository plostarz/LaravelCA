@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl mb-4">Simulation Details</h2>
  <p><strong>User:</strong> {{ $simulation->user->name }}</p>
  <p><strong>Race:</strong> {{ $simulation->race->name }}</p>
  <p><strong>Parameters:</strong></p>
  <pre class="bg-gray-100 p-4 rounded">{{ $simulation->parameters }}</pre>
  <p><strong>Results:</strong></p>
  <pre class="bg-gray-100 p-4 rounded">{{ $simulation->results }}</pre>
  <p><strong>Ran at:</strong> {{ $simulation->created_at->format('Y-m-d H:i') }}</p>
</div>
@endsection