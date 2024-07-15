<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;




// Route::middleware(['guest'])->group(function () {
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/', function () {return view('welcome'); })->name('home');

Route::get('/register', [PageController::class, 'register'])->name('register');
// });

Route::post('/login/proses', [UserController::class, 'login'])->name('login-proses');
Route::post('/register/proses', [UserController::class, 'register'])->name('register-proses');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/pengaduan', [PageController::class, 'adminPengaduan'])->name('admin.pengaduan');
    Route::post('/pengaduan/proses', [UserController::class, 'pengaduan'])->name('pengaduan.proses');
    Route::post('/pengaduan/verifikasi/{id}', [UserController::class, 'verifikasi'])->name('pengaduan.verifikasi');
    Route::get('/pengaduan/{id}/edit', [UserController::class, 'edit'])->name('pengaduan.edit');
    Route::get('/pengaduan/pdf', [UserController::class, 'exportPDF'])->name('pengaduan.pdf');

});

Route::middleware(['petugas'])->group(function () {
    Route::get('/petugas/dashboard', [PageController::class, 'petugasDashboard'])->name('petugas.dashboard');
    Route::get('/petugas/pengaduan', [PageController::class, 'petugasPengaduan'])->name('petugas.pengaduan');
    Route::post('/pengaduan/proses', [UserController::class, 'pengaduan'])->name('pengaduan.proses');
    Route::get('/pengaduan/{id}/edit', [UserController::class, 'edit'])->name('pengaduan.edit');
    Route::post('/pengaduan/{id}/edit', [UserController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [UserController::class, 'destroy'])->name('pengaduan.delete');
});

    Route::get('/pengaduan/{id}/edit', [UserController::class, 'edit'])->name('pengaduan.edit');
    Route::post('/pengaduan/{id}/edit', [UserController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [UserController::class, 'destroy'])->name('pengaduan.delete');


Route::middleware(['masyarakat'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengaduan', [PageController::class, 'pengaduan'])->name('pengaduan');
    Route::post('/pengaduan/proses', [UserController::class, 'pengaduan'])->name('pengaduan.proses');
});






