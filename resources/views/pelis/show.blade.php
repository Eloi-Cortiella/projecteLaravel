@extends('layouts.main')

@section('title', 'Detalls pel·lícula')

@section('content')
<div class="flex items-center justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold">{{ $movie->title }}</h1>
    <div class="flex gap-3">
        <a class="underline" href="{{ route('movies.edit', $movie) }}">Editar</a>
        <a class="underline" href="{{ route('movies.index') }}">Tornar</a>
    </div>
</div>

<div class="border rounded p-4 max-w-xl grid gap-2">
    <div><span class="font-semibold">Plataforma:</span> {{ $movie->platform }}</div>
    <div><span class="font-semibold">Any:</span> {{ $movie->release_year }}</div>
    <div><span class="font-semibold">Preu:</span> {{ number_format((float)$movie->price, 2) }} €</div>
    <div><span class="font-semibold">Descripció:</span> {{ $movie->description }}</div>
</div>

<form class="mt-6" method="POST" action="{{ route('movies.destroy', $movie) }}"
      onsubmit="return confirm('Vols eliminar aquesta pel·lícula?');">
    @csrf
    @method('DELETE')
    <button class="border px-4 py-2 rounded hover:bg-gray-50">Eliminar</button>
</form>
@endsection