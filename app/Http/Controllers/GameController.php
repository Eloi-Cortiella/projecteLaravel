<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderByDesc('created_at')->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $game = Game::create($data);

        return redirect()
            ->route('games.show', $game)
            ->with('success', 'Videojoc creat correctament.');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $this->validated($request);
        $game->update($data);

        return redirect()
            ->route('games.show', $game)
            ->with('success', 'Videojoc actualitzat.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()
            ->route('games.index')
            ->with('success', 'Videojoc eliminat.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'platform' => ['required', 'array'],
            'platform.*' => ['string', 'max:255'],
            'release_year' => ['required', 'integer', 'min:1950', 'max:2100'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_multiplayer' => ['nullable', 'boolean'],
        ]);

        $data['platform'] = implode(', ', $data['platform']);
        // checkbox safe parse
        $data['is_multiplayer'] = $request->boolean('is_multiplayer');

        return $data;
    }
}