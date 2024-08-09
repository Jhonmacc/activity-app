<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreemapController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/categories', [TreemapController::class, 'index']);
Route::post('/categories', [TreemapController::class, 'store']);
Route::put('/categories/{id}', [TreemapController::class, 'update']);
Route::delete('/categories/{id}', [TreemapController::class, 'destroy']);
