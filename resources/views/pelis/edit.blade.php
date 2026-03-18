@extends('layouts.main')

@section('title', 'Editar pel·lícula')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar pel·lícula</h1>

<form method="POST" action="{{ route('movies.update', $movie) }}">
    @include('movies._form', ['movie' => $movie])
</form>
@endsection