@extends('layouts.app')

@section('content')
<!-- Include custom CSS -->
<link rel="stylesheet" href="{{ asset('css/f1Theme.css') }}">

<div class="driver-container">
    <div class="flex justify-between items-center mb-8">
        <h1 class="section-title">Our Drivers</h1>
        <a href="{{ route('drivers.create') }}" class="btn-add-driver">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add Driver
        </a>
    </div>
    
    @if(count($drivers) > 0)
        <!-- First 6 drivers -->
        <div class="driver-grid">
            @foreach($drivers->take(6) as $driver)
                <div class="driver-card">
                    <div class="driver-img-container">
                   @if($driver->image_path)
    <img src="{{ asset($driver->image_path) }}" alt="{{ $driver->name }}" class="driver-img">
@else
                            <div class="driver-img-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <div class="driver-info">
                        <h3 class="driver-name">{{ $driver->name }}</h3>
                        <p class="driver-nationality">{{ $driver->nationality }}</p>
                        <p class="driver-details">
                            {{ $driver->team?->name ?? 'No Team' }} • {{ $driver->date_of_birth->format('Y-m-d') }}
                        </p>
                        
                        <div class="driver-actions">
                            <a href="{{ route('drivers.edit', $driver) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('drivers.destroy', $driver) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this driver?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Show More Button (if more than 6 drivers) -->
        @if(count($drivers) > 6)
            <div id="more-drivers-container" style="display: none;">
                <div class="driver-grid mt-8">
                    @foreach($drivers->skip(6) as $driver)
                        <div class="driver-card">
                            <div class="driver-img-container">
                            @if($driver->image_path)
    <img src="{{ asset($driver->image_path) }}" alt="{{ $driver->name }}" class="driver-img">
@else
                                    <div class="driver-img-placeholder">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="driver-info">
                                <h3 class="driver-name">{{ $driver->name }}</h3>
                                <p class="driver-nationality">{{ $driver->nationality }}</p>
                                <p class="driver-details">
                                    {{ $driver->team?->name ?? 'No Team' }} • {{ $driver->date_of_birth->format('Y-m-d') }}
                                </p>
                                
                                <div class="driver-actions">
                                    <a href="{{ route('drivers.edit', $driver) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('drivers.destroy', $driver) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this driver?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <button id="show-more-btn" class="btn-show-more">Show More Drivers</button>
            
            <script>
                document.getElementById('show-more-btn').addEventListener('click', function() {
                    const container = document.getElementById('more-drivers-container');
                    const button = document.getElementById('show-more-btn');
                    
                    if (container.style.display === 'none') {
                        container.style.display = 'block';
                        button.textContent = 'Show Less';
                    } else {
                        container.style.display = 'none';
                        button.textContent = 'Show More Drivers';
                    }
                });
            </script>
        @endif
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-img">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <h3 class="empty-title">No drivers found</h3>
            <p class="empty-message">Start building your F1 team by adding your first driver</p>
            <a href="{{ route('drivers.create') }}" class="btn-add-driver">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add Your First Driver
            </a>
        </div>
    @endif
</div>
@endsection