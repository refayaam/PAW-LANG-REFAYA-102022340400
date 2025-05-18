<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// TODO: Import controller StudentController
use App\Http\Controllers\Api\StudentController;

// TODO: Create routes to handle requests
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
