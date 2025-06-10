<?php

namespace Database\Factories;

use App\Models\PenerimaanSakramen;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Umat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenerimaanSakramen>
 */
class PenerimaanSakramenFactory extends Factory
{
    protected $model = PenerimaanSakramen::class;

    public function definition(): array
    {
        return [
            'id_sakramen' => $this->faker->numberBetween(1, 7), // Random dari 1 sampai 7
            'nik' => Umat::factory(),
            'tanggal_penerimaan_sakramen' => $this->faker->dateTimeBetween('-20 years', 'now'),
        ];
    }
}
