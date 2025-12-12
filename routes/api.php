<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngatlanController;
use App\Http\Controllers\KategoriaController;



// User (példa, ha használod Sanctum auth-ot)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Ingatlan végpontok
Route::get('/ingatlanok', [IngatlanController::class, 'index']);
Route::post('/ingatlan', [IngatlanController::class, 'store']);
Route::get('/ingatlan/{id}', [IngatlanController::class, 'show']);
Route::put('/ingatlan/{id}', [IngatlanController::class, 'update']);
Route::delete('/ingatlan/{id}', [IngatlanController::class, 'destroy']);

// Kategoria végpontok
Route::get('/kategoriak', [KategoriaController::class, 'index']);
Route::post('/kategoria', [KategoriaController::class, 'store']);
Route::get('/kategoria/{id}', [KategoriaController::class, 'show']);
Route::put('/kategoria/{id}', [KategoriaController::class, 'update']);
Route::delete('/kategoria/{id}', [KategoriaController::class, 'destroy']);
