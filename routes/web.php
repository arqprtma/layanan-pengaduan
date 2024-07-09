<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;




Route::middleware(['guest'])->group(function () {
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [PageController::class, 'register'])->name('register');
});

Route::post('/login/proses', [UserController::class, 'login'])->name('login-proses');
Route::post('/register/proses', [UserController::class, 'register'])->name('register-proses');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
});

