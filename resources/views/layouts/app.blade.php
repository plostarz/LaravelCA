<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center text-xl font-bold text-red-600">
                        F1 Analytics
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center">
                    <a href="/" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="/data" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Data</a>
                    <a href="/simulation" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Simulate</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-6">
        @yield('content')
    </main>
</body>
</html>