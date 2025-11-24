<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // USER
        $users = User::factory(10)->create();

        // CATEGORY
        $categories = Category::factory(5)->create();

        // PRODUCT
        $products = Product::factory(20)->create();

        // ORDER
        $orders = Order::factory(15)->create([
            'user_id' => $users->random()->id
        ]);

        // ORDER ITEMS
        foreach ($orders as $order) {
            OrderItem::factory(rand(1, 3))->create([
                'order_id' => $order->id,
                'product_id' => $products->random()->id
            ]);
        }
    }
}
