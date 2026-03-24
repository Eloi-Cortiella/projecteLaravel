<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800 font-sans">
<header class="bg-indigo-600 text-white shadow-md">
    <nav class="container mx-auto px-4 py-6 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="font-bold text-2xl tracking-tight flex items-center gap-3 hover:text-indigo-100 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
            {{ config('app.name', 'LaravelTinkering') }}
        </a>

        <div class="flex items-center gap-2 text-lg font-medium">
            <a href="{{ route('home') }}" 
            class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white transition">
                Inici
            </a>

            <a href="{{ route('games.index') }}" 
            class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white transition">
                Videojocs
            </a>

            <a href="{{ route('movies.index') }}" 
            class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white transition">
                Pel·lícules
            </a>
        </div>
    </nav>
</header>

<main class="container mx-auto px-4 py-8 flex-1">
    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800 flex items-center gap-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="bg-slate-900 text-slate-400 mt-auto">
    <div class="container mx-auto px-4 py-6 text-sm flex flex-col sm:flex-row items-center justify-between">
        <p>Creat per: <strong class="text-black">Eloi Cortiella</strong> &copy; 2025/2026</p>
        <p class="mt-2 sm:mt-0">2n DAM — Projecte Laravel</p>
    </div>
</footer>
</body>
</html>