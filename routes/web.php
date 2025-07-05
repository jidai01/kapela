<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLogin;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\{
     BerandaController,
     BeritaController,
     BeritaUmumController,
     KegiatanKubController,
     KegiatanWilayahController,
     KubController,
     LaporanController,
     LoginController,
     PenerimaanSakramenController,
     PengumumanController,
     PengumumanUmumController,
     ProfilController,
     SakramenController,
     UmatController,
     UserController,
     WilayahController
};

/*
|--------------------------------------------------------------------------
| Public Routes (Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/', [BerandaController::class, 'index']);

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Profil
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah']);
Route::get('/profil/organisasi', [ProfilController::class, 'organisasi']);

// Pengumuman Umum
Route::get('/pengumuman', [PengumumanUmumController::class, 'index']);
Route::get('/pengumuman/{slug}', [PengumumanUmumController::class, 'detail']);

// Berita Umum
Route::get('/berita', [BeritaUmumController::class, 'index']);
Route::get('/berita/{slug}', [BeritaUmumController::class, 'detail']);


/*
|--------------------------------------------------------------------------
| Routes with Authentication (Butuh Login)
|--------------------------------------------------------------------------
*/

Route::middleware([CekLogin::class])->group(function () {

     // Dashboard sesuai Role
     Route::get('/beranda/admin', [BerandaController::class, 'index_admin'])
          ->middleware(CheckRole::class . ':admin')
          ->name('beranda/admin');

     Route::get('/beranda/ketua', [BerandaController::class, 'index_ketua'])
          ->middleware(CheckRole::class . ':ketua')
          ->name('beranda/ketua');

     Route::get('/beranda/humas', [BerandaController::class, 'index_humas'])
          ->middleware(CheckRole::class . ':humas')
          ->name('beranda/humas');

     // Data User
     Route::prefix('kelola')->group(function () {
          Route::get('/data-user', [UserController::class, 'index']);
          Route::get('/tambah-user', [UserController::class, 'tambah']);
          Route::post('/kirim-user', [UserController::class, 'kirim']);
          Route::get('/edit-user/{id}', [UserController::class, 'edit']);
          Route::post('/update-user', [UserController::class, 'update']);
          Route::get('/delete-user/{id}', [UserController::class, 'delete']);

          // Data Wilayah
          Route::get('/data-wilayah', [WilayahController::class, 'index']);
          Route::get('/tambah-wilayah', [WilayahController::class, 'tambah']);
          Route::post('/kirim-wilayah', [WilayahController::class, 'kirim']);
          Route::get('/edit-wilayah/{id}', [WilayahController::class, 'edit']);
          Route::post('/update-wilayah', [WilayahController::class, 'update']);
          Route::get('/delete-wilayah/{id}', [WilayahController::class, 'delete']);

          // Data KUB
          Route::get('/data-kub', [KubController::class, 'index']);
          Route::get('/tambah-kub', [KubController::class, 'tambah']);
          Route::post('/kirim-kub', [KubController::class, 'kirim']);
          Route::get('/edit-kub/{id}', [KubController::class, 'edit']);
          Route::post('/update-kub', [KubController::class, 'update']);
          Route::get('/delete-kub/{id}', [KubController::class, 'delete']);

          // Data Sakramen
          // Route::get('/data-sakramen', [SakramenController::class, 'index']);
          // Route::get('/tambah-sakramen', [SakramenController::class, 'tambah']);
          // Route::post('/kirim-sakramen', [SakramenController::class, 'kirim']);
          // Route::get('/edit-sakramen/{id}', [SakramenController::class, 'edit']);
          // Route::post('/update-sakramen', [SakramenController::class, 'update']);
          // Route::get('/delete-sakramen/{id}', [SakramenController::class, 'delete']);
          // Delete sakramen dinonaktifkan untuk menjaga keutuhan data sakramen

          // Data Umat
          Route::get('/data-umat', [UmatController::class, 'index']);
          Route::get('/detail-umat/{id}', [UmatController::class, 'detail']);
          Route::get('/tambah-umat', [UmatController::class, 'tambah']);
          Route::post('/kirim-umat', [UmatController::class, 'kirim']);
          Route::get('/edit-umat/{id}', [UmatController::class, 'edit']);
          Route::post('/update-umat', [UmatController::class, 'update']);
          Route::get('/delete-umat/{id}', [UmatController::class, 'delete']);

          // Kegiatan Wilayah
          Route::get('/data-kegiatan-wilayah', [KegiatanWilayahController::class, 'index']);
          Route::get('/tambah-kegiatan-wilayah', [KegiatanWilayahController::class, 'tambah']);
          Route::post('/kirim-kegiatan-wilayah', [KegiatanWilayahController::class, 'kirim']);
          Route::get('/edit-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'edit']);
          Route::post('/update-kegiatan-wilayah', [KegiatanWilayahController::class, 'update']);
          Route::get('/delete-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'delete']);

          // Kegiatan KUB
          Route::get('/data-kegiatan-kub', [KegiatanKubController::class, 'index']);
          Route::get('/tambah-kegiatan-kub', [KegiatanKubController::class, 'tambah']);
          Route::post('/kirim-kegiatan-kub', [KegiatanKubController::class, 'kirim']);
          Route::get('/edit-kegiatan-kub/{id}', [KegiatanKubController::class, 'edit']);
          Route::post('/update-kegiatan-kub', [KegiatanKubController::class, 'update']);
          Route::get('/delete-kegiatan-kub/{id}', [KegiatanKubController::class, 'delete']);

          // Penerimaan Sakramen
          Route::get('/data-penerimaan-sakramen', [PenerimaanSakramenController::class, 'index']);
          Route::get('/tambah-penerimaan-sakramen', [PenerimaanSakramenController::class, 'tambah']);
          Route::post('/kirim-penerimaan-sakramen', [PenerimaanSakramenController::class, 'kirim']);
          Route::get('/edit-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'edit']);
          Route::post('/update-penerimaan-sakramen', [PenerimaanSakramenController::class, 'update']);
          Route::get('/delete-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'delete']);

          // Pengumuman
          Route::get('/data-pengumuman', [PengumumanController::class, 'index']);
          Route::get('/tambah-pengumuman', [PengumumanController::class, 'tambah']);
          Route::post('/kirim-pengumuman', [PengumumanController::class, 'kirim']);
          Route::get('/edit-pengumuman/{id}', [PengumumanController::class, 'edit']);
          Route::post('/update-pengumuman', [PengumumanController::class, 'update']);
          Route::get('/delete-pengumuman/{id}', [PengumumanController::class, 'delete']);

          // Berita
          Route::get('/data-berita', [BeritaController::class, 'index']);
          Route::get('/tambah-berita', [BeritaController::class, 'tambah']);
          Route::post('/kirim-berita', [BeritaController::class, 'kirim']);
          Route::get('/edit-berita/{id}', [BeritaController::class, 'edit']);
          Route::post('/update-berita', [BeritaController::class, 'update']);
          Route::get('/delete-berita/{id}', [BeritaController::class, 'delete']);
     });

     // Laporan
     Route::prefix('laporan')->group(function () {
          Route::get('/kegiatan-wilayah', [LaporanController::class, 'kegiatanwilayah']);
          Route::get('/cetak-kegiatan-wilayah', [LaporanController::class, 'cetakkegiatanwilayah']);
          Route::get('/kegiatan-kub', [LaporanController::class, 'kegiatankub']);
          Route::get('/cetak-kegiatan-kub', [LaporanController::class, 'cetakkegiatankub']);
          Route::get('/penerimaan-sakramen', [LaporanController::class, 'penerimaansakramen']);
          Route::get('/cetak-penerimaan-sakramen', [LaporanController::class, 'cetakpenerimaansakramen']);
     });
});
