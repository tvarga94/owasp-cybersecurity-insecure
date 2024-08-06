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
Route::get('/mars-weather', [NasaController::class, 'getMarsWeather']);
Route::get('/neo-feed', [NasaController::class, 'getNeoFeed']);
Route::get('/tech-transfer-patents', [NasaController::class, 'getTechTransferPatents']);
Route::get('/library-assets', [NasaController::class, 'getLibraryAssets']);
Route::get('/sounds-library', [NasaController::class, 'getSoundsLibrary']);
Route::get('/satellite-imagery', [NasaController::class, 'getSatelliteImagery']);
Route::get('/techport-projects', [NasaController::class, 'getTechPortProjects']);
Route::get('/spinoff', [NasaController::class, 'getSpinoff']);
