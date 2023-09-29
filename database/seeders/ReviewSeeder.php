<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $review = new Review();
        $review->product_id = "1";
        $review->customer_id= "DICKY";
        $review->rating = 5;
        $review->comment = "Martabak Nya Enak Sekali";
        $review->save();


        $review2 = new Review();
        $review2->product_id = "2";
        $review2->customer_id= "DICKY";
        $review2->rating = 3;
        $review2->comment = "Roti Bakarnya Lumayan";
        $review2->save();

    }
}
