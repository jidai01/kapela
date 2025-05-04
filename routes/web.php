<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'beranda']);

Route::get('/profil-sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil-organisasi', [ProfilController::class, 'organisasi']);
