<?php

use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/item', [ItemController::class, 'store']);

Route::post('/explorer', [ExplorerController::class, 'store']);

Route::post('/location', [LocationController::class, 'store']);

Route::get('/inventory', [InventoryController::class, 'show']);

Route::get('/explorer', [ItemController::class, 'show']);
