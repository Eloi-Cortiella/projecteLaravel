<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// CRUD Videojocs
Route::resource('games', GameController::class);

// CRUD Pelicules
Route::resource('movies', MovieController::class);

// Si el starter-kit ja porta dashboard/auth, ho mantenim per si el necessites
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
