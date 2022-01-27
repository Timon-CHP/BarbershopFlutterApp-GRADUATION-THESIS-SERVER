<?php

namespace Database\Seeders;

use App\Models\Workplace;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WorkplaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 6; $i++) {
            $workplace = new Workplace();
            $workplace->address = $faker->streetAddress;
            $workplace->latitude = random_int(200000000, 210000000) / pow(10, 7);
            $workplace->longitude = random_int(105000000, 106000000) / pow(10, 6);
            $workplace->save();
        }
    }
}
