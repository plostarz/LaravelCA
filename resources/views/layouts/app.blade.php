<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/f1Theme.css') }}" rel="stylesheet">
    
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        
        .bg-gray-100 {
            background-color: #121212 !important;
        }
        
        .bg-white {
            background-color: #1e1e1e !important;
        }
        
        .text-gray-600, .text-gray-700, .text-gray-800, .text-gray-900 {
            color: #e0e0e0 !important;
        }
        
        .shadow {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5) !important;
        }
        
        .hover\:text-gray-800:hover, .hover\:text-gray-900:hover {
            color: #ffffff !important;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-3 py-2 text-gray-700 hover:text-gray-900">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <a href="{{ route('drivers.index') }}" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800">
                            Drivers
                        </a>
                        <a href="{{ route('races.index') }}" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800">
                            Races
                        </a>
                        <a href="{{ route('teams.index') }}" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800">
                            Teams
                        </a>
                        <a href="{{ route('circuits.index') }}" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800">
                            Circuits
                        </a>
                        <a href="{{ route('simulations.index') }}" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800">
                            Simulations
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        @guest
                            <a href="{{ route('login') }}" class="px-3 py-2 text-gray-600 hover:text-gray-800">Login</a>
                            <a href="{{ route('register') }}" class="px-3 py-2 text-gray-600 hover:text-gray-800">Register</a>
                        @else
                            <span class="px-3 py-2 text-gray-600">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="px-3 py-2 text-gray-600 hover:text-gray-800">Logout</button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>