<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return response()->json($request->user());
// });
