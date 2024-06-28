<?php

use App\Http\Controllers\NasaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/nasa/picture-of-the-day', [NasaController::class, 'showPictureOfTheDay']);
