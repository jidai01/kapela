<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Http\Middleware\CekLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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

Route::get('/profil/sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil/organisasi', [ProfilController::class, 'organisasi']);

Route::get('/kelola/data-user', [UserController::class, 'user']);

Route::get('/kelola/data-wilayah', [WilayahController::class, 'wilayah']);
// Route::get('/tambahPengarang', [PengarangController::class, 'tambah']);
// Route::post('/kirimPengarang', [PengarangController::class, 'kirim']);
// Route::get('/editPengarang/{id}', [PengarangController::class, 'edit']);
// Route::post('/updatePengarang', [PengarangController::class, 'update']);
// Route::get('/deletePengarang/{id}', [PengarangController::class, 'delete']);
