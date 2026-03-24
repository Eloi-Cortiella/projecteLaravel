@csrf
@if(isset($movie))
    @method('PUT')
@endif

<div class="grid gap-4 max-w-4xl">
    <div>
        <label class="block text-sm mb-1">Títol</label>
        <input name="title" class="border rounded p-2 w-full"
               value="{{ old('title', $movie->title ?? '') }}">
        @error('title') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Director</label>
        <input name="director" class="border rounded p-2 w-full"
               value="{{ old('director', $movie->director ?? '') }}">
        @error('director') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Any de llançament</label>
        <input type="number" name="release_year" class="border rounded p-2 w-full"
               value="{{ old('release_year', $movie->release_year ?? '') }}">
        @error('release_year') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Puntuació</label>
        <input type="number" step="0.1" name="rating" class="border rounded p-2 w-full"
               value="{{ old('rating', $movie->rating ?? '') }}">
        @error('rating') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1 font-semibold">Gènere</label>
        @php
            $selectedGenres = old('genre', isset($movie) ? explode(', ', $movie->genre) : []);
            $genreCategories = [
                'Acció i Aventura' => ['Acció', 'Aventura', 'Superherois', 'Espies', 'Arts Marcials'],
                'Ciència Ficció i Fantasia' => ['Ciència Ficció', 'Fantasia', 'Cyberpunk', 'Post-apocalíptic', 'Space Opera'],
                'Suspens i Terror' => ['Terror', 'Thriller', 'Misteri', 'Crim', 'Slasher', 'Paranormal'],
                'Drama i Comèdia' => ['Drama', 'Comèdia', 'Melodrama', 'Tragicomèdia', 'Sitcom', 'Sàtira'],
                'Romanç i Musical' => ['Romanç', 'Comèdia Romàntica', 'Musical', 'Dansa'],
                'Animació i Infantil' => ['Animació 3D', 'Animació 2D', 'Anime', 'Infantil', 'Familiar'],
                'Altres' => ['Documental', 'Biografia', 'Històric', 'Bèl·lic', 'Western', 'Esports'],
            ];
        @endphp
        
        <div class="p-4 border rounded bg-white max-h-[400px] overflow-y-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($genreCategories as $category => $genres)
                <div>
                    <h3 class="font-bold text-gray-700 border-b pb-1 mb-2">{{ $category }}</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-x-4 gap-y-2">
                        @foreach($genres as $gen)
                            <label class="flex items-center gap-2 text-sm hover:bg-gray-50 p-1 rounded cursor-pointer transition-colors">
                                <input type="checkbox" name="genre[]" value="{{ $gen }}"
                                    {{ is_array($selectedGenres) && in_array($gen, $selectedGenres) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span>{{ $gen }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        @error('genre') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="flex gap-3">
        <button class="border px-4 py-2 rounded hover:bg-gray-50">
            {{ isset($movie) ? 'Actualitzar' : 'Crear' }}
        </button>
        <a class="underline self-center" href="{{ route('movies.index') }}">Cancel·lar</a>
    </div>
</div>