<?php

namespace Database\Factories;

use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wilayah>
 */
class WilayahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Wilayah::class;

    public function definition(): array
    {
        return [
            'nama_wilayah' => $this->faker->city,
            'ketua_wilayah' => $this->faker->name,
            'jumlah_anggota' => $this->faker->numberBetween(10, 100),
        ];
    }
}
