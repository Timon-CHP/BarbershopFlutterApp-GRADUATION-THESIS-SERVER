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
        for ($i = 28; $i <= 48; $i++) {
            $user = User::create([
                                     'name'         => $faker->name,
                                     'phone_number' => "+849732712" . floor($i / 10) . $i % 10,
                                     'password'     => Hash::make('Lequangtho12a3'),
                                 ]);

            $user->assignRole(['customer']);
        }
    }
}
