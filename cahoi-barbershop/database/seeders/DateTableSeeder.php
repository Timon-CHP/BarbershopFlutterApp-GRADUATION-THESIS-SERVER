<?php

namespace database\seeders;

use App\Models\Date;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $now = Carbon::now()->addDays($i);
            $date = new Date();
            $date->full_date = $now;
            $date->day_of_month = $now->day;
            $date->month = $now->month;
            $date->year = $now->year;
            $date->is_holiday = false;
            $date->save();
        }
    }
}
