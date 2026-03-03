@extends('layouts.main')

@section('title', 'Editar videojoc')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar videojoc</h1>

<form method="POST" action="{{ route('games.update', $game) }}">
    @include('games._form', ['game' => $game])
</form>
@endsection