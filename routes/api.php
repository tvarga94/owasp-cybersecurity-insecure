<?php

use App\Http\Controllers\NasaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/nasa/picture-of-the-day', [NasaController::class, 'showPictureOfTheDay']);
Route::get('/nasa/mars-rover-photos', [NasaController::class, 'showMarsRoverPhotos']);
Route::get('/nasa/earth-imagery', [NasaController::class, 'showEarthImagery']);
Route::get('/nasa/asteroids', [NasaController::class, 'showAsteroids']);
Route::get('/nasa/epic', [NasaController::class, 'showEPIC']);
