<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\AnimalController;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/human', [HumanController::class, 'store']);

Route::get('/humans', [HumanController::class, 'index']);

Route::post('/animal', [AnimalController::class, 'store']);

Route::get('/animals', [AnimalController::class, 'index']);

Route::get('/animal/{animal}', [AnimalController::class, 'show']);
