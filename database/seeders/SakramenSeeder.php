<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sakramen;

class SakramenSeeder extends Seeder
{
    public function run(): void
    {
        $sakramenList = [
            'Baptis',
            'Tobat',
            'Ekaristi',
            'Krisma',
            'Perkawinan',
            'Imamat',
            'Pengurapan Orang Sakit'
        ];

        foreach ($sakramenList as $nama) {
            Sakramen::updateOrCreate(
                ['nama_sakramen' => $nama],
                []
            );
        }
    }
}
