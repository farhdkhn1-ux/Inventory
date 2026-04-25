<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'category_id' => Category::inRandomOrder()->first()->id,
        'name' => $this->faker->word(),
        'price' => $this->faker->numberBetween(10000, 100000),
        'stock' => $this->faker->numberBetween(1, 100),
    ];
}
}
