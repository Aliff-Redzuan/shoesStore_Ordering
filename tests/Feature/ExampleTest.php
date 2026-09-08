<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_redirects_to_customer_portal(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/customer/shop');
    }

    public function test_checkout_redirects_when_cart_is_empty(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'customer']));

        $response = $this->get('/customer/checkout');

        $response->assertRedirect('/customer/shop');
    }

    public function test_checkout_creates_order_for_cash_pickup(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'customer']));

        $product = Product::factory()->create([
            'name' => 'Test Running Shoe',
            'brand' => 'Nike',
            'price' => 120.50,
            'sizes' => json_encode([7, 8, 9]),
        ]);

        $this->withSession([
            'cart' => [
                $product->id . '_8' => [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'brand' => $product->brand,
                    'price' => $product->price,
                    'size' => '8',
                    'quantity' => 1,
                ],
            ],
        ])->post('/customer/checkout', [
            'customer_name' => 'Jane Doe',
            'customer_email' => 'jane@example.com',
            'customer_phone' => '0123456789',
            'pickup_location' => 'store',
            'payment_method' => 'cash',
            'notes' => 'Please call me when ready.',
        ])->assertRedirect('/customer/order/1/confirmation');

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Jane Doe',
            'customer_email' => 'jane@example.com',
            'payment_method' => 'cash',
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_name' => 'Test Running Shoe',
            'size' => '8',
            'quantity' => 1,
        ]);

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseCount('order_items', 1);
    }

    public function test_guest_user_must_login_before_adding_to_cart(): void
    {
        $product = Product::factory()->create();

        $response = $this->from('/customer/shop')->post('/customer/cart/add', [
            'product_id' => $product->id,
            'size' => '8',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('login_required');
    }

    public function test_admin_and_staff_logins_redirect_to_their_dashboards(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ])->assertRedirect('/admin');

        $this->assertAuthenticatedAs($admin);

        $this->post('/logout');

        $staff = User::factory()->create([
            'email' => 'staff@example.com',
            'password' => bcrypt('password123'),
            'role' => 'staff',
        ]);

        $this->post('/login', [
            'email' => 'staff@example.com',
            'password' => 'password123',
        ])->assertRedirect('/staff');

        $this->assertAuthenticatedAs($staff);
    }
}
