<?php

namespace Database\Factories;

use App\Models\Krs;
use Illuminate\Database\Eloquent\Factories\Factory;

class KrsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Krs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mahasiswas_id' => $this->faker->randomDigitNotNull,
        'matakuliahs_id' => $this->faker->randomDigitNotNull,
        'tahun_ajaran' => $this->faker->word,
        'nilai' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
