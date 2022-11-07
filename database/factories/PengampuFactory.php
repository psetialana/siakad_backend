<?php

namespace Database\Factories;

use App\Models\Pengampu;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengampuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengampu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matakuliahs_id' => $this->faker->word,
        'dosens_id' => $this->faker->word,
        'tahun_ajaran' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
