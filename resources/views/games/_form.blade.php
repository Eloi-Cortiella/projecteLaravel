@csrf
@if(isset($game))
    @method('PUT')
@endif

<div class="grid gap-4 max-w-4xl">
    <div>
        <label class="block text-sm mb-1">Títol</label>
        <input name="title" class="border rounded p-2 w-full"
               value="{{ old('title', $game->title ?? '') }}">
        @error('title') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1 font-semibold">Plataforma</label>
        @php
            $selectedPlatforms = old('platform', isset($game) ? explode(', ', $game->platform) : []);
            $platformCategories = [
                'PC' => ['Steam', 'Mac', 'Linux', 'MS-DOS', 'Commodore 64', 'Amiga', 'ZX Spectrum', 'Web Browser'],
                'Nintendo' => ['NES', 'SNES', 'Nintendo 64', 'GameCube', 'Nintendo Wii', 'Wii U', 'Nintendo Switch', 'Game Boy', 'Game Boy Color', 'Game Boy Advance', 'Nintendo DS', 'Nintendo 3DS'],
                'PlayStation' => ['PlayStation', 'PlayStation 2', 'PlayStation 3', 'PlayStation 4', 'PlayStation 5', 'PSP', 'PS Vita'],
                'Xbox' => ['Xbox', 'Xbox 360', 'Xbox One', 'Xbox Series X/S'],
                'Sega' => ['Sega Master System', 'Mega Drive / Genesis', 'Sega Saturn', 'Dreamcast', 'Game Gear'],
                'Altres / Retro' => ['Atari 2600', 'Arcade', 'Mobile (iOS/Android)'],
            ];
        @endphp
        
        <div class="p-4 border rounded bg-white max-h-[400px] overflow-y-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($platformCategories as $category => $platforms)
                    <div>
                        <h3 class="font-bold text-gray-700 border-b pb-1 mb-2">{{ $category }}</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-x-4 gap-y-2">
                            @foreach($platforms as $plat)
                                <label class="flex items-center gap-2 text-sm hover:bg-gray-50 p-1 rounded cursor-pointer transition-colors">
                                    <input type="checkbox" name="platform[]" value="{{ $plat }}"
                                        {{ is_array($selectedPlatforms) && in_array($plat, $selectedPlatforms) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <span>{{ $plat }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
            @endforeach
        </div>
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