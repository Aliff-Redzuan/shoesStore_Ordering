<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'customer@viola.com'],
            [
                'name' => 'Customer User',
                'password' => \Illuminate\Support\Facades\Hash::make('customer123'),
                'role' => 'customer',
            ]
        );

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'customer',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@viola.com'],
            [
                'name' => 'Admin User',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@viola.com'],
            [
                'name' => 'Staff User',
                'password' => \Illuminate\Support\Facades\Hash::make('staff123'),
                'role' => 'staff',
            ]
        );

        // Seed products
        $this->call(ProductSeeder::class);
    }
}
