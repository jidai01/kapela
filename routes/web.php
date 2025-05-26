<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'beranda']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'authenticate']);

// Halaman beranda berdasarkan role
Route::get('/beranda/admin', function () {
     return view('beranda-admin');
})->name('beranda.admin')->middleware('auth');

Route::get('/beranda/ketua', function () {
     return view('beranda-ketua');
})->name('beranda.ketua')->middleware('auth');

Route::get('/beranda/humas', function () {
     return view('beranda-humas');
})->name('beranda.humas')->middleware('auth');

Route::get('/profil-sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil-organisasi', [ProfilController::class, 'organisasi']);
