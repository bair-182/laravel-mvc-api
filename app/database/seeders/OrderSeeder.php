<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Database\Factories\OrderFactory;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Order::factory(50)
            ->create()->each(function ($order) {
                $order->orderItems()->saveMany(OrderItem::factory(rand(1, 5))->make());
            });
    }
}
