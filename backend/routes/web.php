<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtEventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/art_event/get', [ArtEventController::class, 'getAll']);
Route::get('/api/art_event/sort', [ArtEventController::class, 'sort']);
Route::get('/api/art_event/search', [ArtEventController::class, 'search']);

