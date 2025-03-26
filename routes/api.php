<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json(['data' => 'tes']);
    });

    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('/portfolio')->group(function () {
        Route::get('/data', [PortfolioController::class, 'data'])->name('portfolio.data');
        Route::post('/store', [PortfolioController::class, 'store'])->name('portfolio.store');
        Route::get('/{id}/detail', [PortfolioController::class, 'show'])->name('portfolio.detail');
    });

    Route::prefix('/technology')->group(function () {
        Route::get('/data', [TechnologyController::class, 'data'])->name('technology.data');
        Route::post('/store', [TechnologyController::class, 'store'])->name('technology.store');
        Route::post('/{id}/update', [TechnologyController::class, 'update'])->name('technology.update');
        Route::post('/delete', [TechnologyController::class, 'destroy'])->name('technology.destroy');
        Route::get('/export', [TechnologyController::class, 'export'])->name('technology.export');
    });
});
