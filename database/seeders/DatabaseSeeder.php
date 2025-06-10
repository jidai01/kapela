<?php

namespace Database\Seeders;

use App\Models\Kub;
use App\Models\Sakramen;
use App\Models\Umat;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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

        $this->call([
            SakramenSeeder::class,
        ]);

        Wilayah::factory()->count(5)->create()->each(function ($wilayah) {
            $kubs = Kub::factory()->count(3)->create([
                'id_wilayah' => $wilayah->id_wilayah,
            ]);

            $kubs->each(function ($kub) use ($wilayah) {
                Umat::factory()->count(10)->create([
                    'id_kub' => $kub->id_kub,
                    'id_wilayah' => $wilayah->id_wilayah,
                ]);
            });
        });
    }
}
