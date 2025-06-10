<?php

namespace Database\Factories;

use App\Models\Kub;
use App\Models\Umat;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wilayah;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Umat>
 */
class UmatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Umat::class;

    public function definition(): array
    {
        return [
            'nik' => $this->faker->unique()->numerify('################'),
            'id_kub' => Kub::factory(),
            'id_wilayah' => Wilayah::factory(),
            'nama_lengkap' => $this->faker->name,
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'alamat' => $this->faker->address,
            'nomor_telepon' => $this->faker->phoneNumber,
            'pekerjaan' => $this->faker->jobTitle,
            'status_baptis' => 'Belum',
            'status_komuni' => 'Belum',
            'status_krisma' => 'Belum',
            'status_nikah' => 'Belum',
        ];
    }
}
