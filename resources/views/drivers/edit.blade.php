@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/f1-theme.css') }}">

<div class="driver-container">
    <div class="mb-8">
        <h1 class="section-title">Edit Driver: {{ $driver->name }}</h1>
    </div>
    
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg">
        <form action="{{ route('drivers.update', $driver) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Driver Image -->
            <div class="mb-6">
                <label for="image" class="block text-white text-sm font-medium mb-2">Driver Photo</label>
                <div class="flex items-start">
                    <div class="mr-4">
                        @if($driver->image_path)
                            <img src="{{ asset($driver->image_path) }}" alt="{{ $driver->name }}" class="w-32 h-32 rounded-full object-cover border-4 border-red-600">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gray-800 flex items-center justify-center border-4 border-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <input type="file" id="image" name="image" class="block w-full text-white bg-gray-800 border border-gray-700 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        <p class="mt-1 text-sm text-gray-500">Upload a new photo (JPG, PNG, GIF)</p>
                    </div>
                </div>
            </div>
            
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-white text-sm font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $driver->name) }}" required
                    class="block w-full bg-gray-800 border border-gray-700 rounded-md text-white py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Nationality -->
            <div class="mb-4">
                <label for="nationality" class="block text-white text-sm font-medium mb-2">Nationality</label>
                <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $driver->nationality) }}" required
                    class="block w-full bg-gray-800 border border-gray-700 rounded-md text-white py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                @error('nationality')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Team -->
            <div class="mb-4">
                <label for="team_id" class="block text-white text-sm font-medium mb-2">Team</label>
                <select id="team_id" name="team_id" 
                    class="block w-full bg-gray-800 border border-gray-700 rounded-md text-white py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                    <option value="">-- No Team --</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('team_id', $driver->team_id) == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @error('team_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Date of Birth -->
            <div class="mb-6">
                <label for="date_of_birth" class="block text-white text-sm font-medium mb-2">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $driver->date_of_birth->format('Y-m-d')) }}" required
                    class="block w-full bg-gray-800 border border-gray-700 rounded-md text-white py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                @error('date_of_birth')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('drivers.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md transition duration-300">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition duration-300">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection