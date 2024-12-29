<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtEventController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/art_event/get', [ArtEventController::class, 'getAll']);
Route::get('/art_event/sort', [ArtEventController::class, 'sort']);
Route::get('/art_event/search', [ArtEventController::class, 'search']);
Route::delete('/art_event/delete', [ArtEventController::class, 'delete']);
Route::post('/users/register', [AuthController::class, 'register']);