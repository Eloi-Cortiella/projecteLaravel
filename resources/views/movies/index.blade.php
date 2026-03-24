@extends('layouts.main')

@section('title', 'CRUD Pelicules')

@section('content')
<div class="flex items-center justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold">Pelicules</h1>
    <a href="{{ route('movies.create') }}" class="border px-3 py-2 rounded hover:bg-gray-50">+ Nou</a>
</div>

<div class="overflow-x-auto border rounded">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
        <tr class="text-left">
            <th class="p-3">Títol</th>
            <th class="p-3">Director</th>
            <th class="p-3">Any</th>
            <th class="p-3">Gènere</th>
            <th class="p-3">Puntuació</th>
            <th class="p-3">Accions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($movies as $movie)
            <tr class="border-t">
                <td class="p-3 font-medium">{{ $movie->title }}</td>
                <td class="p-3">{{ $movie->director }}</td>
                <td class="p-3">{{ $movie->release_year }}</td>
                <td class="p-3">{{ $movie->genre }}</td>
                <td class="p-3">{{ $movie->rating }}</td>
                <td class="p-3">
                    <div class="flex flex-wrap gap-2">
                        <a class="underline" href="{{ route('movies.show', $movie) }}">Veure    Detalls</a>
                        <a class="underline" href="{{ route('movies.edit', $movie) }}">Editar</a>

                        <form method="POST" action="{{ route('movies.destroy', $movie) }}"
                              onsubmit="return confirm('Vols eliminar aquesta pel·lícula?');">
                            @csrf
                            @method('DELETE')
                            <button class="underline">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td class="p-3" colspan="6">Encara no hi ha pel·lícules. Crea'n una!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection