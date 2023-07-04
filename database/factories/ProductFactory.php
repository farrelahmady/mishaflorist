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
    public function definition(): array
    {
        return [
            'name' => "Bunga " . $this->faker->word,
            'price' => $this->faker->randomNumber(2) * $this->faker->randomElement([1000, 10000]),
            'quantity' => $this->faker->numberBetween(0, 10),
            'description' => $this->faker->text,
        ];
    }
}
