<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KubController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SakramenController;
use App\Http\Controllers\UmatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Http\Middleware\CekLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [BerandaController::class, 'beranda']);
Route::middleware([CekLogin::class, CheckRole::class . ':admin'])->group(function () {
     Route::get('/beranda/admin', [BerandaController::class, 'berandaAdmin'])->name('beranda/admin');
});
Route::middleware([CekLogin::class, CheckRole::class . ':ketua'])->group(function () {
     Route::get('/beranda/ketua', [BerandaController::class, 'berandaKetua'])->name('beranda/ketua');
});
Route::middleware([CekLogin::class, CheckRole::class . ':humas'])->group(function () {
     Route::get('/beranda/humas', [BerandaController::class, 'berandaHumas'])->name('beranda/humas');
});

Route::get('/profil/sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil/organisasi', [ProfilController::class, 'organisasi']);

Route::get('/kelola/data-user', [UserController::class, 'user'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-user', [UserController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-user', [UserController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-user/{id}', [UserController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-user', [UserController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-user/{id}', [UserController::class, 'delete'])->middleware(CekLogin::class);

Route::get('/kelola/data-wilayah', [WilayahController::class, 'wilayah'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-wilayah', [WilayahController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-wilayah', [WilayahController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-wilayah/{id}', [WilayahController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-wilayah', [WilayahController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-wilayah/{id}', [WilayahController::class, 'delete'])->middleware(CekLogin::class);

Route::get('/kelola/data-kub', [KubController::class, 'kub'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-kub', [KubController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-kub', [KubController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-kub/{id}', [KubController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-kub', [KubController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-kub/{id}', [KubController::class, 'delete'])->middleware(CekLogin::class);

Route::get('/kelola/data-sakramen', [SakramenController::class, 'sakramen'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-sakramen', [SakramenController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-sakramen', [SakramenController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-sakramen/{id}', [SakramenController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-sakramen', [SakramenController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-sakramen/{id}', [SakramenController::class, 'delete'])->middleware(CekLogin::class);

Route::get('/kelola/data-umat', [UmatController::class, 'umat'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-umat', [UmatController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-umat', [UmatController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-umat/{id}', [UmatController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-umat', [UmatController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-umat/{id}', [UmatController::class, 'delete'])->middleware(CekLogin::class);

// Route::get('/tambahPengarang', [PengarangController::class, 'tambah']);
// Route::post('/kirimPengarang', [PengarangController::class, 'kirim']);
// Route::get('/editPengarang/{id}', [PengarangController::class, 'edit']);
// Route::post('/updatePengarang', [PengarangController::class, 'update']);
// Route::get('/deletePengarang/{id}', [PengarangController::class, 'delete']);