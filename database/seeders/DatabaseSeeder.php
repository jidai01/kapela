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
        // Buat akun pengguna
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

        // Jalankan seeder Sakramen (isi data manual di SakramenSeeder)
        $this->call([
            SakramenSeeder::class,
        ]);

        // Ambil data sakramen dari database
        $sakramens = Sakramen::all();

        // Generate data wilayah dan relasi terkait
        Wilayah::factory()->count(5)->create()->each(function ($wilayah) use ($sakramens) {
            // Kegiatan Wilayah
            KegiatanWilayah::factory()->count(2)->create([
                'id_wilayah' => $wilayah->id_wilayah,
            ]);

            // Kub dan turunannya
            Kub::factory()->count(3)->create([
                'id_wilayah' => $wilayah->id_wilayah,
            ])->each(function ($kub) use ($wilayah, $sakramens) {
                // Kegiatan KUB
                KegiatanKub::factory()->count(2)->create([
                    'id_kub' => $kub->id_kub,
                ]);

                // Umat
                $umats = Umat::factory()->count(10)->create([
                    'id_kub' => $kub->id_kub,
                    'id_wilayah' => $wilayah->id_wilayah,
                ]);

                // Penerimaan Sakramen (2 random sakramen per umat)
                $umats->each(function ($umat) use ($sakramens) {
                    $sakramens->random(2)->each(function ($sakramen) use ($umat) {
                        PenerimaanSakramen::factory()->create([
                            'nik' => $umat->nik,
                            'id_sakramen' => $sakramen->id_sakramen,
                        ]);
                    });
                });
            });
        });
    }
}
