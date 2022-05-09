<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($j = 0; $j < 7; $j++) {
            $timeP = $now->addDays($j);
            Calendar::create([
                "scheduled_start_at" => $timeP->setTime(8, 0)->toDateTime(),
                "scheduled_end_at" => $timeP->setTime(18, 0)->toDateTime(),
            ]);

        }
    }
}
