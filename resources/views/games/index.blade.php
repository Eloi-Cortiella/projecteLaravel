@extends('layouts.main')

@section('title', 'CRUD Videojocs')

@section('content')
<div class="flex items-center justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold">Videojocs</h1>
    <a href="{{ route('games.create') }}" class="border px-3 py-2 rounded hover:bg-gray-50">+ Nou</a>
</div>

<div class="overflow-x-auto border rounded">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
        <tr class="text-left">
            <th class="p-3">Títol</th>
            <th class="p-3">Plataforma</th>
            <th class="p-3">Any</th>
            <th class="p-3">Preu</th>
            <th class="p-3">Multi</th>
            <th class="p-3">Accions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($games as $game)
            <tr class="border-t">
                <td class="p-3 font-medium">{{ $game->title }}</td>
                <td class="p-3">{{ $game->platform }}</td>
                <td class="p-3">{{ $game->release_year }}</td>
                <td class="p-3">{{ number_format((float)$game->price, 2) }} €</td>
                <td class="p-3">{{ $game->is_multiplayer ? 'Sí' : 'No' }}</td>
                <td class="p-3">
                    <div class="flex flex-wrap gap-2">
                        <a class="underline" href="{{ route('games.show', $game) }}">Show</a>
                        <a class="underline" href="{{ route('games.edit', $game) }}">Edit</a>

                        <form method="POST" action="{{ route('games.destroy', $game) }}"
                              onsubmit="return confirm('Vols eliminar aquest videojoc?');">
                            @csrf
                            @method('DELETE')
                            <button class="underline">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td class="p-3" colspan="6">Encara no hi ha videojocs. Crea'n un!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection