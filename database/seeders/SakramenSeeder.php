<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sakramen;

class SakramenSeeder extends Seeder
{
    public function run(): void
    {
        $sakramenList = [
            ['nama_sakramen' => 'Baptis'],
            ['nama_sakramen' => 'Tobat'],
            ['nama_sakramen' => 'Ekaristi'],
            ['nama_sakramen' => 'Krisma'],
            ['nama_sakramen' => 'Perkawinan'],
            ['nama_sakramen' => 'Imamat'],
            ['nama_sakramen' => 'Pengurapan Orang Sakit'],
        ];

        foreach ($sakramenList as $data) {
            Sakramen::updateOrCreate(
                ['nama_sakramen' => $data['nama_sakramen']],
                $data
            );
        }
    }
}