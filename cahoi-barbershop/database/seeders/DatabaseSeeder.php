<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RankTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CategoryServiceTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        
        // $this->call(UserTableSeeder::class);
    }
}
