<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'release_year',
        'genre',
        'rating',
    ];

    protected $casts = [
        'release_year' => 'integer',
        'rating' => 'decimal:1',
    ];
}