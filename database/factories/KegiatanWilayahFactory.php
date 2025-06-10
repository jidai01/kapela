<?php

namespace Database\Factories;

use App\Models\KegiatanWilayah;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wilayah;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KegiatanWilayah>
 */
class KegiatanWilayahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KegiatanWilayah::class;

    public function definition(): array
    {
        return [
            'id_wilayah' => Wilayah::factory(),
            'nama_kegiatan_wilayah' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph,
            'tanggal_kegiatan' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
        ];
    }
}
