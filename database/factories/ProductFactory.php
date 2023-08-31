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
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'amount' => $this->faker->numberBetween(0, 100),
            'category_id' => $this->faker->numberBetween(1, 3),
            'relevance_weight' => $this->faker->numberBetween(1, 100),
        ];
    }
}
