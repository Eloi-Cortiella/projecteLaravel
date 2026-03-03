@extends('layouts.main')

@section('title', 'Detall videojoc')

@section('content')
<div class="flex items-center justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold">{{ $game->title }}</h1>
    <div class="flex gap-3">
        <a class="underline" href="{{ route('games.edit', $game) }}">Editar</a>
        <a class="underline" href="{{ route('games.index') }}">Tornar</a>
    </div>
</div>

<div class="border rounded p-4 max-w-xl grid gap-2">
    <div><span class="font-semibold">Plataforma:</span> {{ $game->platform }}</div>
    <div><span class="font-semibold">Any:</span> {{ $game->release_year }}</div>
    <div><span class="font-semibold">Preu:</span> {{ number_format((float)$game->price, 2) }} €</div>
    <div><span class="font-semibold">Multijugador:</span> {{ $game->is_multiplayer ? 'Sí' : 'No' }}</div>
</div>

<form class="mt-6" method="POST" action="{{ route('games.destroy', $game) }}"
      onsubmit="return confirm('Vols eliminar aquest videojoc?');">
    @csrf
    @method('DELETE')
    <button class="border px-4 py-2 rounded hover:bg-gray-50">Eliminar</button>
</form>
@endsection