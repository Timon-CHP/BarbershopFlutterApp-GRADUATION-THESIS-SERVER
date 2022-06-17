<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\ImageTask;
use App\Models\Product;
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

                $product = Product::query()->where("id", random_int(1, 10))->first();
                TaskProduct::create([
                                        "task_id"    => $task->id,
                                        "price" => $product->price,
                                        "name_product" => $product->name,
                                        "product_id" => $product->id,
                                    ]);

                $product = Product::query()->where("id", random_int(1, 10))->first();
                TaskProduct::create([
                                        "task_id"    => $task->id,
                                        "price" => $product->price,
                                        "name_product" => $product->name,
                                        "product_id" => $product->id,
                                    ]);

                Bill::query()->create([
                                          'total'   => random_int(1, 500),
                                          'task_id' => $task->id,
                                      ]);

                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-01911654789706.jpg",
                                               "task_id" => $task->id,
                                           ]);
                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-01951655033827.jpg",
                                               "task_id" => $task->id,
                                           ]);
                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-11911654789706.jpg",
                                               "task_id" => $task->id,
                                           ]);
                ImageTask::query()->create([
                                               "link"    => "/upload/task/Task-11951655033827.jpg",
                                               "task_id" => $task->id,
                                           ]);
            }
        }
    }
}
