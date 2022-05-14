<?php

namespace App\Services;

use App\Models\Image;
use App\Models\ImageTask;
use App\Models\Stylist;
use App\Models\Task;
use App\Models\TaskProduct;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class TaskService extends BaseService
{
    function createModel(): void
    {
        $this->model = new  Task();
    }

    function createTask(Request $request): array
    {
        $rule = [
            'time_slot_id' => 'required',
            'date' => 'required',
            'stylist_id' => 'required',
            'products' => 'required|array|min:1',
        ];

        $this->doValidate($request, $rule);

        $task = $this->model->create([
            "time_slot_id" => $request->time_slot_id,
            "date" => $request->date,
            "notes" => $request->notes,
            "customer_id" => auth()->user()->id,
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

    #[ArrayShape(["data" => "\Illuminate\Contracts\Pagination\LengthAwarePaginator"])]
    function getTaskViaDay(Request $request): LengthAwarePaginator
    {
        $rule = [
            'add_day' => 'required',
        ];
        $status = $request->status;
        $this->doValidate($request, $rule);


        $stylist = Stylist::query()
            ->where('user_id', auth()->user()->id)
            ->first();

        return $this->model::query()
            ->with('customer')
            ->with('products')
            ->with('image')
            ->with('time')
            ->where('stylist_id', $stylist->id)
            ->whereDate('date', Carbon::today()->addDay($request->add_day))
            ->when($status !== null, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->paginate(10);
//        if ($status === null)
//            return $task->paginate(10);
//        else {
//            $task->where("status", $status);
//            return $task->paginate(10);
//        }

    }

    #[ArrayShape(["data" => "\Illuminate\Contracts\Pagination\LengthAwarePaginator"])]
    function getTaskUncompleted(Request $request): array
    {
        $rule = [
            'stylist_id' => 'required|exists:stylists,id',
        ];

        $this->doValidate($request, $rule);

        $task = $this->model::query()->with('customer')
            ->where('stylist_id', $request->stylist_id)
            ->where('status', 0);
        return [
            "data" => $task->paginate(10)
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Contracts\Pagination\LengthAwarePaginator"])]
    function getTaskCompleted(Request $request): array
    {
        $rule = [
            'stylist_id' => 'required|exists:stylists,id',
        ];

        $this->doValidate($request, $rule);

        $task = $this->model::query()->with('customer')
            ->where('stylist_id', $request->stylist_id)
            ->where('status', 1);
        return [
            "data" => $task->paginate(10)
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection"])]
    function getDetail(Request $request): array
    {
        $rule = [
            'task_id' => 'required|exists:tasks,id',
        ];

        $this->doValidate($request, $rule);

        $task = $this->model::query()
            ->with('customer')
            ->with('products')
            ->with('image')
            ->with('time')
            ->where('id', $request->task_id)
            ->first();

        return [
            "data" => $task
        ];
    }

    /**
     * @throws Exception
     */
    public function updateStatus(Request $request): array
    {
        $rule = [
            "images" => 'required|array|min:0|max:4',
            "task_id" => 'required|exists:tasks,id'
        ];

        $this->doValidate($request, $rule);
        try {
            DB::beginTransaction();
            $task = $this->model->find($request->task_id);
            if ($task->status == 1) {
                return [
                    "data" => false,
                    "message" => "Can't update"
                ];
            }
            $task->status = 1;
            $task->save();
            $images = $request->file('images');

            $dataImages = [];
            foreach ($images as $key => $image) {
                $nameImageOriginal = $image->getClientOriginalName();
                $arrayNameImage = explode('.', $nameImageOriginal);
                $fileExt = end($arrayNameImage);
                $destinationPath = './upload/task/';
                $nameImage = 'Task-' . $key . $task['id'] . time() . '.' . $fileExt;
                $image->move($destinationPath, $nameImage);
                $dataImages[$key]['link'] = '/upload/task/' . $nameImage;
                $dataImages[$key]['task_id'] = $task->id;
            }

            $imageTask = new ImageTask();
            $imageTask::query()->insert($dataImages);
            DB::commit();
            return [
                "data" => true
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    #[ArrayShape(["data" => "\Illuminate\Contracts\Pagination\LengthAwarePaginator"])]
    public function getViaCustomerId(Request $request): array
    {
        $rule = [
            'customer_id' => 'required:users,id'
        ];

        $this->doValidate($request, $rule);

        return [
            "data" => $this->model::query()
                ->with('image')
                ->where('customer_id', $request->customer_id)
                ->paginate(10)
        ];
    }
}
