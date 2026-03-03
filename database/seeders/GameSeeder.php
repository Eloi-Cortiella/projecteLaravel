<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::insert([
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'platform' => 'Nintendo Switch',
                'release_year' => 2017,
                'price' => 59.99,
                'is_multiplayer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Overwatch 2',
                'platform' => 'PC',
                'release_year' => 2022,
                'price' => 0.00,
                'is_multiplayer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fortnite',
                'platform' => 'PC',
                'release_year' => 2017,
                'price' => 0.00,
                'is_multiplayer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}