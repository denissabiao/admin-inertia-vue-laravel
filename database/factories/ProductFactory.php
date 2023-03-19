<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> fake()->name(),
            'description'=> fake()->name(),
            'type'=> fake()->name(),
            'brand'=> fake()->name(),
            'category'=> fake()->name(),
            'price'=>fake()->numberBetween(1,10),
            'sale'=>fake()->boolean(),
            'discount'=>fake()->numberBetween(1,10),
            'stock'=>fake()->numberBetween(1,10),
            'new'=>'1',
        ];
    }
}
