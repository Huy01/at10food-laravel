<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeProduct;
use App\Models\Product;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeProduct::factory()->count(10)->create();
        Product::factory()->count(10)->create();
    }
}
