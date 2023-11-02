<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory(50)
            ->create()->each(function ($product) {
                $stock = Stock::factory(rand(1, 3))->make();
                $product->stocks()->saveMany($stock);
            });
    }
}
