<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        Movie::insert([
            [
                'title' => 'Inception',
                'director' => 'Christopher Nolan',
                'release_year' => 2010,
                'genre' => 'Sci-Fi',
                'rating' => 8.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Shawshank Redemption',
                'director' => 'Frank Darabont',
                'release_year' => 1994,
                'genre' => 'Drama',
                'rating' => 9.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Godfather',
                'director' => 'Francis Ford Coppola',
                'release_year' => 1972,
                'genre' => 'Crime',
                'rating' => 9.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}