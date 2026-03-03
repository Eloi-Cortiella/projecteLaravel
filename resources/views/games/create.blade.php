@extends('layouts.main')

@section('title', 'Crear videojoc')

@section('content')
<h1 class="text-2xl font-bold mb-4">Crear videojoc</h1>

<form method="POST" action="{{ route('games.store') }}">
    @include('games._form')
</form>
@endsection