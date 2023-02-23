<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'product_name' => Str::random(15),
                'product_category' => rand(1, 5),
                'product_details' => Str::random(55),
                'product_price' => rand(150, 950),
                'product_image' => 'no_image.jpg',
                'product_stock' => rand(10, 90),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
