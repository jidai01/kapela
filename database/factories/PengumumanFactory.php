<?php

namespace Database\Factories;

use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PengumumanFactory extends Factory
{
    protected $model = Pengumuman::class;

    public function definition()
    {
        $judul = $this->faker->unique()->sentence(5);
        return [
            'judul_pengumuman' => $judul,
            'isi_pengumuman' => $this->faker->paragraph(4),
            'tanggal_terbit' => $this->faker->date(),
        ];
    }
}
