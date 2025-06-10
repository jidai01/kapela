<?php

namespace Database\Factories;

use App\Models\KegiatanKub;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kub;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KegiatanKub>
 */
class KegiatanKubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KegiatanKub::class;

    public function definition(): array
    {
        return [
            'id_kub' => Kub::factory(),
            'nama_kegiatan_kub' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph,
            'tanggal_kegiatan' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
        ];
    }
}
