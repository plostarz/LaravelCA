<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formula 1 Hub</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background-color: #0d0d0d;
            color: #e6e6e6;
        }

        a {
            color: #e10600;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: #e10600;
        }

        .hero {
            text-align: center;
            padding-top: 4rem;
        }

        .hero h1 {
            font-size: 3rem;
            color: #ffffff;
        }

        .hero p {
            font-size: 1.25rem;
            color: #bbbbbb;
        }

        .nav-links a {
            margin-left: 1rem;
            font-weight: 600;
        }

        .button {
            background-color: #e10600;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            text-transform: uppercase;
        }

        .button:hover {
            background-color: #c20000;
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 hero">
            <div class="logo">F1 Hub</div>
            <h1>Welcome to the Ultimate Formula 1 Experience</h1>
            <p>Stay up to date with races, teams, and championship standings.</p>
            <div class="mt-6">
                <a href="{{ url('/dashboard') }}" class="button">Enter Garage</a>
            </div>
        </div>
    </div>
</body>
</html>
