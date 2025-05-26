<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Middleware\CekLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'authenticate']);
// Route logout
Route::post('/logout', function () {
     Auth::logout();
     request()->session()->invalidate();
     request()->session()->regenerateToken();
     return redirect('/login');
})->name('logout');


Route::get('/', [BerandaController::class, 'beranda']);

Route::middleware([CekLogin::class, CheckRole::class . ':admin'])->group(function () {
     Route::get('/beranda/admin', [BerandaController::class, 'berandaAdmin'])->name('beranda.admin');
});

Route::middleware([CekLogin::class, CheckRole::class . ':ketua'])->group(function () {
     Route::get('/beranda/ketua', [BerandaController::class, 'berandaKetua'])->name('beranda.ketua');
});

Route::middleware([CekLogin::class, CheckRole::class . ':humas'])->group(function () {
     Route::get('/beranda/humas', [BerandaController::class, 'berandaHumas'])->name('beranda.humas');
});

Route::get('/profil-sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil-organisasi', [ProfilController::class, 'organisasi']);
