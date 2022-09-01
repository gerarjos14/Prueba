<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VacaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight' => $this->faker->randomNumber(3, true),
            'milk_per_day' => $this->faker->randomNumber(2, true),
        ];
    }
}
