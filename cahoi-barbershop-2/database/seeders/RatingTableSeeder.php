<?php

namespace Database\Seeders;

use App\Models\Rating;
use Exception;
use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        for ($i = 1; $i < 50; $i++) {
            Rating::create([
                "communication_rate" => random_int(1, 5),
                "skill_rate" => random_int(3, 5),
                "task_id" => $i
            ]);
        }
    }
}
