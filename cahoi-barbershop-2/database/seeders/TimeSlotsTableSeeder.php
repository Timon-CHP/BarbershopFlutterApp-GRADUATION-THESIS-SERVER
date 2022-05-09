<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TimeSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            TimeSlot::query()->create([
                'time' => Carbon::now()->setTime(8, 0)->addMinutes($i * 30)
            ]);
        }
    }
}
