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
            'name' => fake()->word(),
            'category_id' => random_int(1, 20),
            'supplier_id' => random_int(1, 20),
            'description' => fake()->sentence(),
            'main_picture' => fake()->filePath(),
        ];
    }
}
