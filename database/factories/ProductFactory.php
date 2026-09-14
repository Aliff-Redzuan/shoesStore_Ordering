<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $brands = [
            'Nike',
            'Adidas',
            'Puma',
            'Reebok',
            'New Balance',
            'Converse',
            'Vans',
            'Saucony',
        ];

        $types = [
            'Running',
            'Casual',
            'Basketball',
            'Soccer',
            'Tennis',
            'Hiking',
            'Skate',
        ];

        return [
            'name' => fake()->unique()->word() . ' ' . fake()->randomElement($types),
            'brand' => fake()->randomElement($brands),
            'price' => fake()->randomFloat(2, 50, 250),
            'description' => fake()->sentence(10),

            // Default image for factory-created products.
            // This prevents image from being empty.
            'image' => 'products/default-shoe.jpg',

            'category' => 'shoes',
            'sizes' => json_encode([
                6,
                7,
                8,
                9,
                10,
                11,
                12,
                13,
            ]),
            'stock' => fake()->numberBetween(5, 100),
        ];
    }
}