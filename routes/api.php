<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\IndexController;
use App\Http\Controllers\Product\StoreController;
use App\Http\Controllers\Product\ShowController;
use App\Http\Controllers\Product\EditController;
use App\Http\Controllers\Product\UpdateController;
use App\Http\Controllers\Product\DestroyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::prefix('products')->middleware('jwt.auth')->group(function() {
    Route::get('/', IndexController::class);
    Route::get('/{product}', ShowController::class);
    Route::post('/', StoreController::class);
    Route::patch('/{product}', UpdateController::class);
    Route::delete('/{product}', DestroyController::class);
});