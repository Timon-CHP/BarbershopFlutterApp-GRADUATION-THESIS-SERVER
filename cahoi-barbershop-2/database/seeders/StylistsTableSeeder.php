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

        $users = [];
        for ($i = 1; $i <= 27; $i++) {
            if ($i == 8) {
                $users[] = [
                    'name'         => $faker->name,
                    'phone_number' => "+84973271200",
                    'password'     => Hash::make('Lequangtho12a3'),
                ];
            } else {
                $users[] = [
                    'name'         => $faker->name,
                    'phone_number' => "+849732712" . floor($i / 10) . $i % 10,
                    'password'     => Hash::make('Lequangtho12a3'),
                ];
            }
        }

        User::query()->insert($users);
        $stylists = [];

        for ($i = 0; $i < 9; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $user = User::query()->find($i * 3 + $j + 1);
                $user->assignRole(['stylist']);
                $stylists[] = [
                    'user_id'     => $user->id,
                    'facility_id' => $i + 1
                ];
            }
        }

        Stylist::query()->insert($stylists);
    }
}
