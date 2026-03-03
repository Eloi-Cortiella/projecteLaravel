@extends('layouts.main')

@section('title', 'Landing')

@section('content')
<section class="py-10">
    <h1 class="text-3xl font-bold mb-3">LaravelTinkering</h1>
    <p class="text-gray-700 mb-6">
        Aplicació web amb Laravel (MVC) i base de dades SQLite. Inclou una landing page i un CRUD de videojocs.
    </p>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="border rounded p-4">
            <h2 class="font-semibold mb-2">MVC</h2>
            <p class="text-sm text-gray-600">Model (Eloquent), Vistes (Blade) i Controladors.</p>
        </div>
        <div class="border rounded p-4">
            <h2 class="font-semibold mb-2">SQLite</h2>
            <p class="text-sm text-gray-600">Base de dades local i simple per practicar.</p>
        </div>
        <div class="border rounded p-4">
            <h2 class="font-semibold mb-2">CRUD + Show</h2>
            <p class="text-sm text-gray-600">Crear, editar, eliminar i veure el detall d'un videojoc.</p>
        </div>
    </div>

    <div class="mt-8">
        <a class="underline" href="{{ route('games.index') }}">Anar al CRUD de videojocs →</a>
    </div>
</section>
@endsection