<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition()
    {
        $judul = $this->faker->unique()->sentence(6);
        return [
            'judul_berita' => $judul,
            'isi_berita' => $this->faker->paragraph(5),
            'foto' => 'img/' . collect(['c1.jpg', 'c2.jpg', 'c3.jpg'])->random(),
            'tanggal_terbit' => $this->faker->date(),
        ];
    }
}
