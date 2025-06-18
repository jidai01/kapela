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
          Route::resource('data-wilayah', WilayahController::class);
          Route::get('/tambah-wilayah', [WilayahController::class, 'tambah']);
          Route::post('/kirim-wilayah', [WilayahController::class, 'kirim']);
          Route::get('/edit-wilayah/{id}', [WilayahController::class, 'edit']);
          Route::post('/update-wilayah', [WilayahController::class, 'update']);
          Route::get('/delete-wilayah/{id}', [WilayahController::class, 'delete']);

          // Data KUB
          Route::resource('data-kub', KubController::class);
          Route::get('/tambah-kub', [KubController::class, 'tambah']);
          Route::post('/kirim-kub', [KubController::class, 'kirim']);
          Route::get('/edit-kub/{id}', [KubController::class, 'edit']);
          Route::post('/update-kub', [KubController::class, 'update']);
          Route::get('/delete-kub/{id}', [KubController::class, 'delete']);

          // Data Sakramen
          Route::resource('data-sakramen', SakramenController::class);
          Route::get('/tambah-sakramen', [SakramenController::class, 'tambah']);
          Route::post('/kirim-sakramen', [SakramenController::class, 'kirim']);
          Route::get('/edit-sakramen/{id}', [SakramenController::class, 'edit']);
          Route::post('/update-sakramen', [SakramenController::class, 'update']);
          // Route::get('/delete-sakramen/{id}', [SakramenController::class, 'delete']);

          // Data Umat
          Route::get('/data-umat', [UmatController::class, 'index']);
          Route::get('/detail-umat/{id}', [UmatController::class, 'detail']);
          Route::get('/tambah-umat', [UmatController::class, 'tambah']);
          Route::post('/kirim-umat', [UmatController::class, 'kirim']);
          Route::get('/edit-umat/{id}', [UmatController::class, 'edit']);
          Route::post('/update-umat', [UmatController::class, 'update']);
          Route::get('/delete-umat/{id}', [UmatController::class, 'delete']);

          // Kegiatan Wilayah
          Route::resource('data-kegiatan-wilayah', KegiatanWilayahController::class);
          Route::get('/tambah-kegiatan-wilayah', [KegiatanWilayahController::class, 'tambah']);
          Route::post('/kirim-kegiatan-wilayah', [KegiatanWilayahController::class, 'kirim']);
          Route::get('/edit-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'edit']);
          Route::post('/update-kegiatan-wilayah', [KegiatanWilayahController::class, 'update']);
          Route::get('/delete-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'delete']);

          // Kegiatan KUB
          Route::resource('data-kegiatan-kub', KegiatanKubController::class);
          Route::get('/tambah-kegiatan-kub', [KegiatanKubController::class, 'tambah']);
          Route::post('/kirim-kegiatan-kub', [KegiatanKubController::class, 'kirim']);
          Route::get('/edit-kegiatan-kub/{id}', [KegiatanKubController::class, 'edit']);
          Route::post('/update-kegiatan-kub', [KegiatanKubController::class, 'update']);
          Route::get('/delete-kegiatan-kub/{id}', [KegiatanKubController::class, 'delete']);

          // Penerimaan Sakramen
          Route::resource('data-penerimaan-sakramen', PenerimaanSakramenController::class);
          Route::get('/tambah-penerimaan-sakramen', [PenerimaanSakramenController::class, 'tambah']);
          Route::post('/kirim-penerimaan-sakramen', [PenerimaanSakramenController::class, 'kirim']);
          Route::get('/edit-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'edit']);
          Route::post('/update-penerimaan-sakramen', [PenerimaanSakramenController::class, 'update']);
          Route::get('/delete-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'delete']);

          // Pengumuman
          Route::resource('data-pengumuman', PengumumanController::class);
          Route::get('/tambah-pengumuman', [PengumumanController::class, 'tambah']);
          Route::post('/kirim-pengumuman', [PengumumanController::class, 'kirim']);
          Route::get('/edit-pengumuman/{id}', [PengumumanController::class, 'edit']);
          Route::post('/update-pengumuman', [PengumumanController::class, 'update']);
          Route::get('/delete-pengumuman/{id}', [PengumumanController::class, 'delete']);

          // Berita
          Route::resource('data-berita', BeritaController::class);
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





// Route::get('/', [BerandaController::class, 'index']);
// Route::middleware([CekLogin::class, CheckRole::class . ':admin'])->group(function () {
//      Route::get('/beranda/admin', [BerandaController::class, 'index_admin'])->name('beranda/admin');
// });
// Route::middleware([CekLogin::class, CheckRole::class . ':ketua'])->group(function () {
//      Route::get('/beranda/ketua', [BerandaController::class, 'index_ketua'])->name('beranda/ketua');
// });
// Route::middleware([CekLogin::class, CheckRole::class . ':humas'])->group(function () {
//      Route::get('/beranda/humas', [BerandaController::class, 'index_humas'])->name('beranda/humas');
// });

// Data User
// Route::get('/kelola/data-user', [UserController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-user', [UserController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-user', [UserController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-user/{id}', [UserController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-user', [UserController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-user/{id}', [UserController::class, 'delete'])->middleware(CekLogin::class);

// Data Wilayah
// Route::get('/kelola/data-wilayah', [WilayahController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-wilayah', [WilayahController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-wilayah', [WilayahController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-wilayah/{id}', [WilayahController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-wilayah', [WilayahController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-wilayah/{id}', [WilayahController::class, 'delete'])->middleware(CekLogin::class);

// Data KUB
// Route::get('/kelola/data-kub', [KubController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-kub', [KubController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-kub', [KubController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-kub/{id}', [KubController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-kub', [KubController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-kub/{id}', [KubController::class, 'delete'])->middleware(CekLogin::class);

// Data Sakramen
// Route::get('/kelola/data-sakramen', [SakramenController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-sakramen', [SakramenController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-sakramen', [SakramenController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-sakramen/{id}', [SakramenController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-sakramen', [SakramenController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-sakramen/{id}', [SakramenController::class, 'delete'])->middleware(CekLogin::class);

// Data Umat
// Route::get('/kelola/data-umat', [UmatController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/detail-umat/{id}', [UmatController::class, 'detail'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-umat', [UmatController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-umat', [UmatController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-umat/{id}', [UmatController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-umat', [UmatController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-umat/{id}', [UmatController::class, 'delete'])->middleware(CekLogin::class);

// Data Kegiatan Wilayah
// Route::get('/kelola/data-kegiatan-wilayah', [KegiatanWilayahController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-kegiatan-wilayah', [KegiatanWilayahController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-kegiatan-wilayah', [KegiatanWilayahController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-kegiatan-wilayah', [KegiatanWilayahController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-kegiatan-wilayah/{id}', [KegiatanWilayahController::class, 'delete'])->middleware(CekLogin::class);

// Data Kegiatan Kub
// Route::get('/kelola/data-kegiatan-kub', [KegiatanKubController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-kegiatan-kub', [KegiatanKubController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-kegiatan-kub', [KegiatanKubController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-kegiatan-kub/{id}', [KegiatanKubController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-kegiatan-kub', [KegiatanKubController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-kegiatan-kub/{id}', [KegiatanKubController::class, 'delete'])->middleware(CekLogin::class);

// Data Penerimaan Sakramen
// Route::get('/kelola/data-penerimaan-sakramen', [PenerimaanSakramenController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-penerimaan-sakramen', [PenerimaanSakramenController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-penerimaan-sakramen', [PenerimaanSakramenController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-penerimaan-sakramen', [PenerimaanSakramenController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-penerimaan-sakramen/{id}', [PenerimaanSakramenController::class, 'delete'])->middleware(CekLogin::class);

// Data Pengumuman
// Route::get('/kelola/data-pengumuman', [PengumumanController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-pengumuman', [PengumumanController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-pengumuman', [PengumumanController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-pengumuman/{id}', [PengumumanController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-pengumuman', [PengumumanController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-pengumuman/{id}', [PengumumanController::class, 'delete'])->middleware(CekLogin::class);

// Data Berita
// Route::get('/kelola/data-berita', [BeritaController::class, 'index'])->middleware(CekLogin::class);
// Route::get('/kelola/tambah-berita', [BeritaController::class, 'tambah'])->middleware(CekLogin::class);
// Route::post('/kelola/kirim-berita', [BeritaController::class, 'kirim'])->middleware(CekLogin::class);
// Route::get('/kelola/edit-berita/{id}', [BeritaController::class, 'edit'])->middleware(CekLogin::class);
// Route::post('/kelola/update-berita', [BeritaController::class, 'update'])->middleware(CekLogin::class);
// Route::get('/kelola/delete-berita/{id}', [BeritaController::class, 'delete'])->middleware(CekLogin::class);

// Laporan Kegiatan Wilayah
// Route::get('/laporan/kegiatan-wilayah', [LaporanController::class, 'kegiatanwilayah'])->middleware(CekLogin::class);
// Route::get('/laporan/cetak-kegiatan-wilayah', [LaporanController::class, 'cetakkegiatanwilayah'])->middleware(CekLogin::class);

// Laporan Kegiatan Kub
// Route::get('/laporan/kegiatan-kub', [LaporanController::class, 'kegiatankub'])->middleware(CekLogin::class);
// Route::get('/laporan/cetak-kegiatan-kub', [LaporanController::class, 'cetakkegiatankub'])->middleware(CekLogin::class);

// Laporan Penerimaan Sakramen
// Route::get('/laporan/penerimaan-sakramen', [LaporanController::class, 'penerimaansakramen'])->middleware(CekLogin::class);
// Route::get('/laporan/cetak-penerimaan-sakramen', [LaporanController::class, 'cetakpenerimaansakramen'])->middleware(CekLogin::class);
