<?php

namespace Database\Seeders;

use App\Models\Discount;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $fake = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Discount::create([
                "code" => $i,
                "name" => $fake->text(30),
                "description" => $fake->text(),
                "reduction" => round(random_int(1, 100) / 100, 2),
            ]);
        }
    }
}
