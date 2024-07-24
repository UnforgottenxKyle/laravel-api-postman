<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/add/user', [UserController::class, 'store']);
Route::put('/update/{user}', [UserController::class, 'update']);
Route::delete('/delete/{user}', [UserController::class, 'destroy']);




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
