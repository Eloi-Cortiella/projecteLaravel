@extends('layouts.main')

@section('title', 'Inici - LaravelTinkering')

@section('content')
<section class="max-w-5xl mx-auto">
    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl shadow-xl p-10 md:p-16 text-center text-white mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Benvinguts a LaravelTinkering</h1>
        <p class="text-lg md:text-xl text-indigo-100 max-w-2xl mx-auto mb-8">
            Una aplicació web moderna construïda amb Laravel per gestionar el teu catàleg de videojocs i pel·lícules preferides de manera senzilla i eficient.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('games.index') }}" class="px-6 py-3 rounded-full bg-white text-indigo-700 font-semibold shadow hover:bg-indigo-50 hover:scale-105 transition-all">
                🎮 Veure Videojocs
            </a>
            <a href="{{ route('movies.index') }}" class="px-6 py-3 rounded-full bg-indigo-500 border border-indigo-400 font-semibold shadow hover:bg-indigo-400 hover:scale-105 transition-all">
                🎬 Veure Pel·lícules
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid gap-6 md:grid-cols-3 mb-10">
        <!-- Feature 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-2">Arquitectura MVC</h2>
            <p class="text-slate-600 leading-relaxed">
                Es fa ús del patró Model-Vista-Controlador de Laravel per separar la lògica de negoci, les bases de dades i les vistes de Blade.
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-2">Operacions CRUD</h2>
            <p class="text-slate-600 leading-relaxed">
                Permet la gestió completa de registres: llistar (Read), crear (Create), editar (Update) i eliminar (Delete) elements amb fluïdesa.
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-sky-100 text-sky-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-2">Base de Dades</h2>
            <p class="text-slate-600 leading-relaxed">
                Fa servir SQLite com a motor relacional i Eloquent ORM de Laravel per consultar i desar les relacions entre de manera eficient.
            </p>
        </div>
    </div>
</section>
@endsection