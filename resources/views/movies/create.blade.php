@extends('layouts.main')

@section('title', 'Crear pelis')

@section('content')
<h1 class="text-2xl font-bold mb-4">Crear pel·lícula</h1>

<form method="POST" action="{{ route('movies.store') }}">
    @include('movies._form')
</form>
@endsection