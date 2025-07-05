<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use App\Models\Kub;
use App\Models\Umat;
use App\Models\KegiatanWilayah;
use App\Models\KegiatanKub;
use App\Models\PenerimaanSakramen;
use App\Models\Sakramen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user manual
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Ketua',
            'email' => 'ketua@example.com',
            'password' => Hash::make('password'),
            'role' => 'ketua',
        ]);

        User::factory()->create([
            'name' => 'Humas',
            'email' => 'humas@example.com',
            'password' => Hash::make('password'),
            'role' => 'humas',
        ]);

        // Seeder lain
        $this->call([
            SakramenSeeder::class,
            PengumumanSeeder::class,
            BeritaSeeder::class,
        ]);

        // Ambil sakramen
        $sakramens = Sakramen::all();

        // Buat Wilayah
        Wilayah::factory()->count(10)->create()->each(function ($wilayah) use ($sakramens) {
            // Kegiatan wilayah
            KegiatanWilayah::factory()->count(10)->create([
                'id_wilayah' => $wilayah->id_wilayah,
            ]);

            // Buat 2–4 kub untuk tiap wilayah
            Kub::factory()->count(rand(2, 4))->create([
                'id_wilayah' => $wilayah->id_wilayah,
            ])->each(function ($kub) use ($wilayah, $sakramens) {
                // Kegiatan kub
                KegiatanKub::factory()->count(5)->create([
                    'id_kub' => $kub->id_kub,
                ]);

                // Buat 5–15 umat per kub
                $umats = Umat::factory()->count(rand(5, 15))->create([
                    'id_kub' => $kub->id_kub,
                    'id_wilayah' => $wilayah->id_wilayah,
                ]);

                // Set penerimaan sakramen untuk umat
                $umats->each(function ($umat) use ($sakramens) {
                    $sakramens->random(rand(1, $sakramens->count()))->each(function ($sakramen) use ($umat) {
                        PenerimaanSakramen::factory()->create([
                            'nik' => $umat->nik,
                            'id_sakramen' => $sakramen->id_sakramen,
                        ]);
                    });
                });

                // Hitung jumlah anggota & pilih ketua KUB
                $kubUmat = $kub->umat()->get();
                $jumlahKub = $kubUmat->count();
                $ketuaKub = $jumlahKub === 0 ? '-' : $kubUmat->random()->nama_lengkap;

                $kub->update([
                    'jumlah_anggota' => $jumlahKub,
                    'ketua_kub' => $ketuaKub,
                ]);
            });

            // Refresh umat wilayah (gabungan semua umat dari kub)
            $allUmat = $wilayah->umat()->get();
            $jumlah = $allUmat->count();
            $ketua = $jumlah === 0 ? '-' : $allUmat->random()->nama_lengkap;

            // Update wilayah dengan data aktual
            $wilayah->update([
                'jumlah_anggota' => $jumlah,
                'ketua_wilayah' => $ketua,
            ]);
        });
    }
}
