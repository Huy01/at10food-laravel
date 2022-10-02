<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'id_type' => rand(1,10),
            'description' => $this->faker->word(),
            'unit_price' => rand(12000, 100000),
            'promotion_price' =>rand(10000, 70000),
            'image' => rand(1,5).'.jpg',
            'unit'=>$this->faker->word()
        ];
    }
}
