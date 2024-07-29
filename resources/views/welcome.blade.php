<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-light">
        <div class="text-center">
            <a href="/" wire:navigate>
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
            <h1 class="mt-4">Welcome to Todo App</h1>
            <p class="lead mt-4">Write ,save and mnanage your todo list activities.</p>

            @if (Route::has('login'))
                <div class="d-flex justify-content-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary me-2">Dashboard</a>
                        
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
