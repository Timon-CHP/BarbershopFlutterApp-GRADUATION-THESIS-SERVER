<?php

namespace Database\Seeders;

use App\Models\Service;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
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
                $service = new Service();
                $service->name = $faker->text(100);
                $service->duration = random_int(30, 180);
                $service->short_description = $faker->text(100);
                $service->full_description = $faker->text();
                $service->price = random_int(10000, 500000);
                $service->category_service_id = $i;
                $service->save();
            }
        }
    }
}
