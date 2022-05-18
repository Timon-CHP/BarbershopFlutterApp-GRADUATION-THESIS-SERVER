<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        //seed user test
        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'password' => Hash::make('12345678'),
            ]);

            $user->assignRole(['customer']);
        }
    }
}
