
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

// Read all data
Route::get('/books', [BookController::class, 'index']);
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'index']);

// Create data
Route::post('/genres', [GenreController::class, 'store']);
Route::post('/authors', [AuthorController::class, 'store']);
