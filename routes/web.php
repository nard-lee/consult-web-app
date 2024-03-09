<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

Route::get('/', [MainController::class, 'Main'])->middleware('auth');

Route::get('/form', [UserController::class, 'ViewForm'])->name('form');

Route::get('/signup/{role}', [UserController::class, 'ViewSignup']);
Route::post('/signup', [UserController::class, 'Signup'])->middleware('validate_new_user');

Route::get('/login/{role}', [UserController::class, 'ViewLogin']);
Route::post('/login', [UserController::class, 'Login'])->middleware('validate_user_data');