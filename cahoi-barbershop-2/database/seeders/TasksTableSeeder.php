<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $now = Carbon::now();
        $fake = Factory::create();
        for ($i = 1; $i < 10; $i++) {
            for ($d = 1; $d < 4; $d++) {
                for ($h = 8; $h <= 10; $h++) {
                    Task::create([
                        "time_start_at" => $now->setTime($h, $i % 2 * 30)->toDateTime(),
                        "notes" => $fake->text(250),
                        "customer_id" => random_int(52, 80),
                        "stylist_id" => random_int(1, 10)
                    ]);
                }
            }
        }
    }
}
