<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Premium Running Shoes',
                'brand' => 'Nike',
                'category' => 'Sports',
                'price' => 129.99,
                'description' => 'High-performance running shoes with advanced cushioning technology.',
                'image' => 'products/shoe-1.jpg',
                'sizes' => json_encode([6, 7, 8, 9, 10, 11, 12, 13]),
                'stock' => 50,
            ],

            [
                'name' => 'Casual Sneakers',
                'brand' => 'Adidas',
                'category' => 'Casual',
                'price' => 89.99,
                'description' => 'Comfortable everyday sneakers perfect for casual wear.',
                'image' => 'products/shoe-2.jpg',
                'sizes' => json_encode([5, 6, 7, 8, 9, 10, 11, 12, 13, 14]),
                'stock' => 75,
            ],

            [
                'name' => 'Basketball Shoes',
                'brand' => 'Nike',
                'category' => 'Sports',
                'price' => 159.99,
                'description' => 'Professional basketball shoes with excellent ankle support.',
                'image' => 'products/shoe-3.jpg',
                'sizes' => json_encode([7, 8, 9, 10, 11, 12, 13, 14, 15]),
                'stock' => 40,
            ],

            [
                'name' => 'Trail Hiking Boots',
                'brand' => 'Puma',
                'category' => 'Boots',
                'price' => 149.99,
                'description' => 'Durable hiking boots for mountain trails and outdoor adventures.',
                'image' => 'products/shoe-4.jpg',
                'sizes' => json_encode([6, 7, 8, 9, 10, 11, 12, 13]),
                'stock' => 35,
            ],

            [
                'name' => 'Skateboard Shoes',
                'brand' => 'Vans',
                'category' => 'Casual',
                'price' => 79.99,
                'description' => 'Stylish skateboard shoes with reinforced toe area.',
                'image' => 'products/shoe-5.jpg',
                'sizes' => json_encode([5, 6, 7, 8, 9, 10, 11, 12, 13]),
                'stock' => 60,
            ],

            [
                'name' => 'Classic Leather Loafers',
                'brand' => 'Clarks',
                'category' => 'Formal',
                'price' => 119.90,
                'description' => 'Elegant leather loafers designed for formal office wear and smart casual looks.',
                'image' => 'products/shoe-6.jpg',
                'sizes' => json_encode([6, 7, 8, 9, 10, 11]),
                'stock' => 28,
            ],

            [
                'name' => 'Street Runner Trainers',
                'brand' => 'New Balance',
                'category' => 'Sports',
                'price' => 139.00,
                'description' => 'Lightweight trainers for city walks and everyday movement.',
                'image' => 'products/shoe-7.jpg',
                'sizes' => json_encode([5, 6, 7, 8, 9, 10, 11, 12]),
                'stock' => 32,
            ],

            [
                'name' => 'Rose Gold Heels',
                'brand' => 'Viola',
                'category' => 'Heels',
                'price' => 189.00,
                'description' => 'Statement heels with a premium finish for special occasions and elegant evenings.',
                'image' => 'products/shoe-8.jpg',
                'sizes' => json_encode([5, 6, 7, 8, 9]),
                'stock' => 18,
            ],

            [
                'name' => 'Everyday Slip-On',
                'brand' => 'Skechers',
                'category' => 'Casual',
                'price' => 95.50,
                'description' => 'Comfortable slip-ons built for all-day wear with soft cushioning.',
                'image' => 'products/shoe-9.jpg',
                'sizes' => json_encode([6, 7, 8, 9, 10, 11, 12]),
                'stock' => 40,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                [
                    'name' => $product['name'],
                ],
                $product
            );
        }
    }
}