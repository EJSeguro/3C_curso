<?php

use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/item', [ItemController::class, 'store']);

    Route::post('/location', [LocationController::class, 'store']);

    Route::get('/locations', [LocationController::class, 'index']);

    Route::get('/location/{explorer}', [LocationController::class, 'show']);

    Route::get('/locations/{explorer}', [LocationController::class, 'showAll']);

    Route::get('/inventory/{inventory}', [InventoryController::class, 'show']);

    Route::get('/inventory', [InventoryController::class, 'index']);

    Route::put('/trade', [InventoryController::class, 'trade']);

    Route::get('/explorer', [ItemController::class, 'show']);

});

Route::post('/register', [ExplorerController::class, 'register']);

Route::post('/login', [ExplorerController::class, 'login']);

