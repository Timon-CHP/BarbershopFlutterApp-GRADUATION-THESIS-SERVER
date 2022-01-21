<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
        for ($i = 0; $i < 25; $i++) {
            $user = new User();
            $user->password = $faker->password();
            $user->name = $faker->name();
            $user->phone_number = $faker->phoneNumber();
            $user->email = $faker->email();
            $user->birthday = $faker->date();
            $user->home_address = $faker->address();
            $user->work_address = $faker->address();
            $user->rank_member_id = random_int(1, 3);
            $user->save();
        }
    }
}
