<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 15 sample products
        Product::factory(15)->create();
        
        // Create specific shoes for the shop
        Product::create([
            'name' => 'Premium Running Shoes',
            'brand' => 'Nike',
            'price' => 129.99,
            'description' => 'High-performance running shoes with advanced cushioning technology.',
            'image' => 'shoe-1.jpg',
            'category' => 'shoes',
            'sizes' => json_encode([6, 7, 8, 9, 10, 11, 12, 13]),
            'stock' => 50,
        ]);
        
        Product::create([
            'name' => 'Casual Sneakers',
            'brand' => 'Adidas',
            'price' => 89.99,
            'description' => 'Comfortable everyday sneakers perfect for casual wear.',
            'image' => 'shoe-2.jpg',
            'category' => 'shoes',
            'sizes' => json_encode([5, 6, 7, 8, 9, 10, 11, 12, 13, 14]),
            'stock' => 75,
        ]);
        
        Product::create([
            'name' => 'Basketball Shoes',
            'brand' => 'Nike',
            'price' => 159.99,
            'description' => 'Professional basketball shoes with excellent ankle support.',
            'image' => 'shoe-3.jpg',
            'category' => 'shoes',
            'sizes' => json_encode([7, 8, 9, 10, 11, 12, 13, 14, 15]),
            'stock' => 40,
        ]);
        
        Product::create([
            'name' => 'Trail Hiking Boots',
            'brand' => 'Puma',
            'price' => 149.99,
            'description' => 'Durable hiking boots for mountain trails and outdoor adventures.',
            'image' => 'shoe-4.jpg',
            'category' => 'shoes',
            'sizes' => json_encode([6, 7, 8, 9, 10, 11, 12, 13]),
            'stock' => 35,
        ]);
        
        Product::create([
            'name' => 'Skateboard Shoes',
            'brand' => 'Vans',
            'price' => 79.99,
            'description' => 'Stylish skateboard shoes with reinforced toe area.',
            'image' => 'shoe-5.jpg',
            'category' => 'shoes',
            'sizes' => json_encode([5, 6, 7, 8, 9, 10, 11, 12, 13]),
            'stock' => 60,
        ]);

        Product::create([
            'name' => 'Classic Leather Loafers',
            'brand' => 'Clarks',
            'price' => 119.90,
            'description' => 'Elegant leather loafers designed for formal office wear and smart casual looks.',
            'image' => 'shoe-6.jpg',
            'category' => 'formal',
            'sizes' => json_encode([6, 7, 8, 9, 10, 11]),
            'stock' => 28,
        ]);

        Product::create([
            'name' => 'Street Runner Trainers',
            'brand' => 'New Balance',
            'price' => 139.00,
            'description' => 'Lightweight trainers for city walks and everyday movement.',
            'image' => 'shoe-7.jpg',
            'category' => 'sports',
            'sizes' => json_encode([5, 6, 7, 8, 9, 10, 11, 12]),
            'stock' => 32,
        ]);

        Product::create([
            'name' => 'Rose Gold Heels',
            'brand' => 'Viola',
            'price' => 189.00,
            'description' => 'Statement heels with a premium finish for special occasions and elegant evenings.',
            'image' => 'shoe-8.jpg',
            'category' => 'heels',
            'sizes' => json_encode([5, 6, 7, 8, 9]),
            'stock' => 18,
        ]);

        Product::create([
            'name' => 'Everyday Slip-On',
            'brand' => 'Sketchers',
            'price' => 95.50,
            'description' => 'Comfortable slip-ons built for all-day wear with soft cushioning.',
            'image' => 'shoe-9.jpg',
            'category' => 'casual',
            'sizes' => json_encode([6, 7, 8, 9, 10, 11, 12]),
            'stock' => 40,
        ]);
    }
}
