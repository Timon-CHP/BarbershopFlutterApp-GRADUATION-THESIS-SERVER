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

        for ($j = 0; $j < 30; $j++) {
            $now->addDays($j);
            $data[] = [
                "scheduled_start_at" => $now->setTime(8, 0)->toDateTime(),
                "scheduled_end_at"   => $now->setTime(18, 0)->toDateTime(),
            ];
        }
        Calendar::query()->insert($data);
    }
}
