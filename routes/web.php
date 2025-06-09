<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KegiatanKubController;
use App\Http\Controllers\KegiatanWilayahController;
use App\Http\Controllers\KubController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenerimaanSakramenController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SakramenController;
use App\Http\Controllers\UmatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Http\Middleware\CekLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [BerandaController::class, 'index']);
Route::middleware([CekLogin::class, CheckRole::class . ':admin'])->group(function () {
     Route::get('/beranda/admin', [BerandaController::class, 'index_admin'])->name('beranda/admin');
});
Route::middleware([CekLogin::class, CheckRole::class . ':ketua'])->group(function () {
     Route::get('/beranda/ketua', [BerandaController::class, 'index_ketua'])->name('beranda/ketua');
});
Route::middleware([CekLogin::class, CheckRole::class . ':humas'])->group(function () {
     Route::get('/beranda/humas', [BerandaController::class, 'index_humas'])->name('beranda/humas');
});

// Profil
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil/organisasi', [ProfilController::class, 'organisasi']);

// Data User
Route::get('/kelola/data-user', [UserController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-user', [UserController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-user', [UserController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-user/{id}', [UserController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-user', [UserController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-user/{id}', [UserController::class, 'delete'])->middleware(CekLogin::class);

// Data Wilayah
Route::get('/kelola/data-wilayah', [WilayahController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-wilayah', [WilayahController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-wilayah', [WilayahController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-wilayah/{id}', [WilayahController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-wilayah', [WilayahController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-wilayah/{id}', [WilayahController::class, 'delete'])->middleware(CekLogin::class);

// Data KUB
Route::get('/kelola/data-kub', [KubController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-kub', [KubController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-kub', [KubController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-kub/{id}', [KubController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-kub', [KubController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-kub/{id}', [KubController::class, 'delete'])->middleware(CekLogin::class);

// Data Sakramen
Route::get('/kelola/data-sakramen', [SakramenController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-sakramen', [SakramenController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-sakramen', [SakramenController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-sakramen/{id}', [SakramenController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-sakramen', [SakramenController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-sakramen/{id}', [SakramenController::class, 'delete'])->middleware(CekLogin::class);

// Data Umat
Route::get('/kelola/data-umat', [UmatController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/detail-umat/{id}', [UmatController::class, 'detail'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-umat', [UmatController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-umat', [UmatController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-umat/{id}', [UmatController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-umat', [UmatController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-umat/{id}', [UmatController::class, 'delete'])->middleware(CekLogin::class);

// Data Kegiatan Wilayah
Route::get('/kelola/data-kegiatan-wilayah', [KegiatanWilayahController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-kegiatan-wilayah', [KegiatanWilayahController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-kegiatan-wilayah', [KegiatanWilayahController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-kegiatan-wilayah', [KegiatanWilayahController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'delete'])->middleware(CekLogin::class);

// Data Kegiatan Kub
Route::get('/kelola/data-kegiatan-kub', [KegiatanKubController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-kegiatan-kub', [KegiatanKubController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-kegiatan-kub', [KegiatanKubController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-kegiatan-kub/{id}', [KegiatanKubController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-kegiatan-kub', [KegiatanKubController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-kegiatan-kub/{id}', [KegiatanKubController::class, 'delete'])->middleware(CekLogin::class);

// Data Penerimaan Sakramen
Route::get('/kelola/data-penerimaan-sakramen', [PenerimaanSakramenController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-penerimaan-sakramen', [PenerimaanSakramenController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-penerimaan-sakramen', [PenerimaanSakramenController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-penerimaan-sakramen', [PenerimaanSakramenController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'delete'])->middleware(CekLogin::class);

// Data Pengumuman
Route::get('/kelola/data-pengumuman', [PengumumanController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-pengumuman', [PengumumanController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-pengumuman', [PengumumanController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-pengumuman/{id}', [PengumumanController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-pengumuman', [PengumumanController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-pengumuman/{id}', [PengumumanController::class, 'delete'])->middleware(CekLogin::class);

// Data Berita
Route::get('/kelola/data-berita', [BeritaController::class, 'index'])->middleware(CekLogin::class);
Route::get('/kelola/tambah-berita', [BeritaController::class, 'tambah'])->middleware(CekLogin::class);
Route::post('/kelola/kirim-berita', [BeritaController::class, 'kirim'])->middleware(CekLogin::class);
Route::get('/kelola/edit-berita/{id}', [BeritaController::class, 'edit'])->middleware(CekLogin::class);
Route::post('/kelola/update-berita', [BeritaController::class, 'update'])->middleware(CekLogin::class);
Route::get('/kelola/delete-berita/{id}', [BeritaController::class, 'delete'])->middleware(CekLogin::class);

// Laporan Kegiatan Wilayah
Route::get('/laporan/kegiatan-wilayah', [LaporanController::class, 'kegiatanwilayah'])->middleware(CekLogin::class);
Route::post('/laporan/cetak-kegiatan-wilayah', [LaporanController::class, 'cetakkegiatanwilayah'])->middleware(CekLogin::class);

// Laporan Kegiatan Kub
Route::get('/laporan/kegiatan-kub', [LaporanController::class, 'kegiatankub'])->middleware(CekLogin::class);
Route::post('/laporan/cetak-kegiatan-kub', [LaporanController::class, 'cetakkegiatankub'])->middleware(CekLogin::class);

// Laporan Penerimaan Sakramen
Route::get('/laporan/penerimaan-sakramen', [LaporanController::class, 'penerimaansakramen'])->middleware(CekLogin::class);
Route::post('/laporan/cetak-penerimaan-sakramen', [LaporanController::class, 'cetakpenerimaansakramen'])->middleware(CekLogin::class);