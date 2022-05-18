<?php

namespace Database\Seeders;

use App\Models\CalendarStylist;
use Illuminate\Database\Seeder;

class CalendarStylistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 27; $i++) {
            for ($j = 1; $j <= 30; $j++) {
                $data[] = [
                    "stylist_id" => $i,
                    "calendar_id" => $j,
                ];
            }
        }

        CalendarStylist::query()->insert($data);
    }
}
