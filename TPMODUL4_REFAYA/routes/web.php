<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// 1. Add a route to display the list of users
Route::get('/users',[UserController::class,'index'])->name('users.index');

// 2. Add a route to display the add user form
Route::get('/users/create',[UserController::class,'create'])->name('users.create');

// 3. Add a route to store the new user
Route::post('/users',[UserController::class,'store'])->name('users.store');

// 4. Add a route to display the edit user form
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');

// 5. Add a route to save user changes
Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');

// 6. Add a route to delete a user
Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');