@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-2xl">Add Driver</h2>
  <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('drivers.partials.form')
    <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Save Driver</button>
  </form>
</div>
@endsection