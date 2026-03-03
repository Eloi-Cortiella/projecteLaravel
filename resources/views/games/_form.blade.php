@csrf
@if(isset($game))
    @method('PUT')
@endif

<div class="grid gap-4 max-w-xl">
    <div>
        <label class="block text-sm mb-1">Títol</label>
        <input name="title" class="border rounded p-2 w-full"
               value="{{ old('title', $game->title ?? '') }}">
        @error('title') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Plataforma</label>
        <input name="platform" class="border rounded p-2 w-full"
               value="{{ old('platform', $game->platform ?? '') }}">
        @error('platform') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Any de llançament</label>
        <input type="number" name="release_year" class="border rounded p-2 w-full"
               value="{{ old('release_year', $game->release_year ?? '') }}">
        @error('release_year') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Preu (€)</label>
        <input type="number" step="0.01" name="price" class="border rounded p-2 w-full"
               value="{{ old('price', $game->price ?? '') }}">
        @error('price') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_multiplayer" value="1"
               {{ old('is_multiplayer', $game->is_multiplayer ?? false) ? 'checked' : '' }}>
        Multijugador
    </label>

    <div class="flex gap-3">
        <button class="border px-4 py-2 rounded hover:bg-gray-50">
            {{ isset($game) ? 'Actualitzar' : 'Crear' }}
        </button>
        <a class="underline self-center" href="{{ route('games.index') }}">Cancel·lar</a>
    </div>
</div>