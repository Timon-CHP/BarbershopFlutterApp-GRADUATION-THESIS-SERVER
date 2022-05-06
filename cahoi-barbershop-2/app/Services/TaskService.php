<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Task;
use App\Models\TaskProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use YaangVu\LaravelBase\Services\impl\BaseService;

class TaskService extends BaseService
{
    function createModel(): void
    {
        $this->model = new  Task();
    }

    function createTask(Request $request): array
    {
        $task = $this->model->create([
            "time_start_at" => $request->time_start_at,
            "notes" => $request->notes,
            "customer_id" => $request->customer_id,
            "stylist_id" => $request->stylist_id,
        ]);

        if ($task) {
            $length = count($request->products);

            for ($i = 0; $i < $length; $i++) {
                TaskProduct::create([
                    "task_id" => $task->id,
                    "product_id" => $request->products[$i],
                ]);
            }

            return [
                "data" => true
            ];
        }
        return [
            "data" => false
        ];
    }

    /**
     * @throws Exception
     */
    public function updateStatus(Request $request): bool
    {
        $rule = [
            "images" => 'required|array|min:0|max:4',
            "task_id" => 'required|exists:tasks,id'
        ];

        $this->doValidate($request, $rule);
        try {
            DB::beginTransaction();
            $task = $this->model->find($request->task_id);
            $task->status = 1;
            $task->save();
            $images = $request->file('images');

            $dataImages = [];
            foreach ($images as $key => $image) {
                $nameImageOriginal = $image->getClientOriginalName();
                $arrayNameImage = explode('.', $nameImageOriginal);
                $fileExt = end($arrayNameImage);
                $destinationPath = './upload/task/';
                $nameImage = 'Task-' . random_int(1, 100) . time() . '.' . $fileExt;
                $image->move($destinationPath, $nameImage);
                $dataImages[$key]['url'] = '/upload/task/' . $nameImage;
            }

            $imageTask = new Image();
            $imageTask::query()->insert($dataImages);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
