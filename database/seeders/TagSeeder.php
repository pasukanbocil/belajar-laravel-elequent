<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = new Tag();
        $tag->id = "pzn";
        $tag->name = "Programer Zaman Now";
        $tag->save();

        $product = Product::find("1");
        $product->tags()->attach($tag);

        $vouher = Voucher::first();
        $vouher->tags()->attach($tag);
    }
}
