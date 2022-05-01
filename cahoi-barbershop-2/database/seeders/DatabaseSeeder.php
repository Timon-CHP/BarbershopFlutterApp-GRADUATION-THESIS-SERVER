<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsSeeder::class);
        $this->call(RankTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StylistsTableSeeder::class);
        $this->call(TypeProductTableSeeder::class);
    }
}
