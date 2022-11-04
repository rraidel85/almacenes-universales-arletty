<?php

namespace Database\Factories;

use App\Models\Unidad_Medida;
use Illuminate\Database\Eloquent\Factories\Factory;

class Unidad_MedidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unidad_Medida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'simbolo' => $this->faker->word,
        'equivalencia' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
