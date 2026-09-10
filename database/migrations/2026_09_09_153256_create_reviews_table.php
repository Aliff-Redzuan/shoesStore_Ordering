<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Customer
            |--------------------------------------------------------------------------
            */
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | Order
            |--------------------------------------------------------------------------
            */
            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | Order Item
            |--------------------------------------------------------------------------
            */
            $table->foreignId('order_item_id')
                ->constrained('order_items')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | Product
            |--------------------------------------------------------------------------
            */
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | Review
            |--------------------------------------------------------------------------
            */
            $table->unsignedTinyInteger('rating');

            $table->text('comment');


            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */
            $table->timestamps();


            /*
            |--------------------------------------------------------------------------
            | Prevent duplicate review for the same item in the same order
            |--------------------------------------------------------------------------
            */
            $table->unique(
                ['user_id', 'order_item_id'],
                'reviews_user_order_item_unique'
            );
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};