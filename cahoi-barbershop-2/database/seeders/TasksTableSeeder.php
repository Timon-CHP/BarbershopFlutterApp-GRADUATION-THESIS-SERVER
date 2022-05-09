<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskProduct;
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
        $fake = Factory::create();
        for ($i = 1; $i < 20; $i++) {
            for ($j = 2; $j < 10; $j += 2) {
                $task = Task::create([
                    "notes" => $fake->text(250),
                    "date" => Carbon::today(),
                    "time_slot_id" => $j,
                    "customer_id" => random_int(52, 80),
                    "stylist_id" => $i
                ]);

                TaskProduct::create([
                    "task_id" => $task->id,
                    "product_id" => random_int(1, 10),
                ]);

                TaskProduct::create([
                    "task_id" => $task->id,
                    "product_id" => random_int(1, 10),
                ]);
            }
        }

    }
}
