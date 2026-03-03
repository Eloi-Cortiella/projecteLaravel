<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'platform',
        'release_year',
        'price',
        'is_multiplayer',
    ];

    protected $casts = [
        'release_year' => 'integer',
        'price' => 'decimal:2',
        'is_multiplayer' => 'boolean',
    ];
}