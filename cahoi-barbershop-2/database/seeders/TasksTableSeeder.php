<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\ImageTask;
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

        for ($i = 1; $i <= 27; $i++) {
            for ($j = 2; $j < 15; $j += 2) {
                $task = Task::create([
                                         "notes"        => $fake->text(250),
                                         "date"         => Carbon::today(),
                                         "status"       => 1,
                                         "time_slot_id" => $j,
                                         "customer_id"  => random_int(29, 48),
                                         "stylist_id"   => $i
                                     ]);

                TaskProduct::create([
                                        "task_id"    => $task->id,
                                        "product_id" => random_int(1, 10),
                                    ]);

                TaskProduct::create([
                                        "task_id"    => $task->id,
                                        "product_id" => random_int(1, 10),
                                    ]);

                Bill::query()->create([
                                          'total'   => random_int(1, 500),
                                          'task_id' => $task->id,
                                      ]);

                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-011652800761.jpg",
                                               "task_id" => $task->id,
                                           ]);
                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-111652800761.jpg",
                                               "task_id" => $task->id,
                                           ]);
                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-211652800761.jpg",
                                               "task_id" => $task->id,
                                           ]);
                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-311652800761.jpg",
                                               "task_id" => $task->id,
                                           ]);
            }
        }
    }
}
