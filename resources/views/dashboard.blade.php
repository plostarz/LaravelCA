{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a 
                  href="{{ route('circuits.index') }}" 
                  class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                >
                  View All Circuits
                </a>
            </div>
        </div>
    </div>
@endsection
