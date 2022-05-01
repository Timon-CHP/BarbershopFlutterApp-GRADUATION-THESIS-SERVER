<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Workplace;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 6; $i++) {
            Facility::create([
                'address' => $faker->streetAddress,
                'latitude' => random_int(200000000, 210000000) / pow(10, 7),
                'longitude' => random_int(105000000, 106000000) / pow(10, 6),
            ]);
        }
    }
}
