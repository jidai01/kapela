<?php

namespace Database\Factories;

use App\Models\Kub;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wilayah;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kub>
 */
class KubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kub::class;

    public function definition(): array
    {
        return [
            'id_wilayah' => Wilayah::factory(), // relasi
            'nama_kub' => $this->faker->word,
            'ketua_kub' => $this->faker->name,
            'jumlah_anggota' => $this->faker->numberBetween(5, 50),
        ];
    }
}
