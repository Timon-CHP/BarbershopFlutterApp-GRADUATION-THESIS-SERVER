<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Service;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {

        $faker = Factory::create();

        for ($i = 1; $i <= 4; $i++) {
            for ($j = 0; $j < 7; $j++) {
                Product::create([
                    'name' => $faker->text(50),
                    'duration' => random_int(30, 180),
                    'sort_description' => $faker->text(50),
                    'description' => $faker->text(),
                    'price' => random_int(0, 25),
                    'type_product_id' => $i,
                ]);
            }
        }
    }
}
