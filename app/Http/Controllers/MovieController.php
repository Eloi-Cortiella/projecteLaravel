<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderByDesc('created_at')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $movie = Movie::create($data);

        return redirect()
            ->route('movies.show', $movie)
            ->with('success', 'Pelicula creada correctament.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $this->validated($request);
        $movie->update($data);

        return redirect()
            ->route('movies.show', $movie)
            ->with('success', 'Pelicula actualitzada.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()
            ->route('movies.index')
            ->with('success', 'Pelicula eliminada.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1888|max:' . date('Y'),
            'genre' => ['required', 'array'],
            'genre.*' => ['string', 'max:255'],
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $data['genre'] = implode(', ', $data['genre']);

        return $data;
    }
}