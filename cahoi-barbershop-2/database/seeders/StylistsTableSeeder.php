<?php

namespace Database\Seeders;

use App\Models\Stylist;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StylistsTableSeeder extends Seeder
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

        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'password' => Hash::make('12345678'),
            ]);

            Stylist::create([
                'user_id' => $user->id,
                'facility_id' => random_int(1, 6)
            ]);
        }
    }
}
