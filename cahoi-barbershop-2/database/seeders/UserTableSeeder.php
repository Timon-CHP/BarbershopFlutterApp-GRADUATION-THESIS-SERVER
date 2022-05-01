<?php

namespace Database\Seeders;

use App\Models\User;
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
        // create demo users
        $user = User::create([
            'phone_number' => "0973271208",
            'name' => "admin",
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole(['super-admin']);
    }
}
