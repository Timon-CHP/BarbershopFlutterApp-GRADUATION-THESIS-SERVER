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
        $this->call(RankTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(StylistsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TypeProductTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CalendarsTableSeeder::class);
        $this->call(CalendarStylistTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(RatingTableSeeder::class);
        $this->call(DiscountsTableSeeder::class);
    }
}
