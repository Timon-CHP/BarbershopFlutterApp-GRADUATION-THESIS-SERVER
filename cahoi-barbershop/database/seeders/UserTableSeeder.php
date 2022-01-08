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
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 25; $i++) {
            User::create([
                'password' => $faker->password(),
                'name' => $faker->name(),
                'phone_number' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'birthday' => $faker->date(),
                'home_address' => $faker->address(),
                'work_address' => $faker->address(),
                'rank_member_id' => random_int(1, 3),
                // 'role_id' => '1',
            ]);
        }
    }
}
