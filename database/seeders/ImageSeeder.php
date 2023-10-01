<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $image = new Image();
            $image->url = "https://www.dicky.com/image/1.jpg";
            $image->imageable_id = "DICKY";
            $image->imageable_type = 'customer';
            $image->save();
        } {
            $image2 = new Image();
            $image2->url = "https://www.martabak.com/image/2.jpg";
            $image2->imageable_id = "1";
            $image2->imageable_type = 'product';
            $image2->save();
        }
    }
}
