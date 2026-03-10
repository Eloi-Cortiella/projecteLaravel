<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
<header class="border-b bg-white">
    <nav class="container mx-auto px-4 py-3 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="font-bold text-lg">
            {{ config('app.name') }}
        </a>

        <div class="flex items-center gap-4">
            <a href="{{ route('home') }}" class="hover:underline">Inici</a>
            <a href="{{ route('games.index') }}" class="hover:underline">Videojocs</a>
        </div>
    </nav>
</header>

<main class="container mx-auto px-4 py-6 flex-1">
    @if(session('success'))
        <div class="mb-4 rounded border p-3">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="border-t bg-white">
    <div class="container mx-auto px-4 py-4 text-sm text-gray-600">
        Creat per: <strong>Eloi Cortiella </strong> 2n DAM — 2025/2026
    </div>
</footer>
</body>
</html>