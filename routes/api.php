<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json(['data' => 'tes']);
    });

    Route::prefix('/portfolio')->group(function () {
        Route::get('/data', [PortfolioController::class, 'data'])->name('portfolio.data');
    });
});
