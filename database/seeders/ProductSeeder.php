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
        $product = new Product();
        $product->id = "1";
        $product->name = "Martabak";
        $product->description = "Martabak Manis Rasa Keju Coklat";
        $product->category_id = "FOOD";
        $product->save();

        $product2 = new Product();
        $product2->id = "2";
        $product2->name = "Roti Bakar";
        $product2->description = "Roti Bakar Rasa Bluberry";
        $product2->category_id = "FOOD";
        $product2->price = 18000;
        $product2->save();
    }
}
