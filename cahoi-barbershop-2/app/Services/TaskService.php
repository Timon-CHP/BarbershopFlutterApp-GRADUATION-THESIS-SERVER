<?php

namespace App\Services;

use App\Models\DiscountTasks;
use App\Models\Image;
use App\Models\ImageTask;
use App\Models\Post;
use App\Models\Product;
use App\Models\Stylist;
use App\Models\Task;
use App\Models\TaskProduct;
use App\Models\User;
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
            'date'         => 'required',
            'stylist_id'   => 'required',
            'products'     => 'required|array|min:1',
        ];

        $this->doValidate($request, $rule);

        $task = $this->model->create([
                                         "time_slot_id" => $request->time_slot_id,
                                         "date"         => $request->date,
                                         "notes"        => $request->notes,
                                         "customer_id"  => auth()->id(),
                                         "stylist_id"   => $request->stylist_id,
                                     ]);
        $user = User::query()->where("id", auth()->id())->first();

        if ($task) {
            DiscountTasks::query()->create([
                                               "discount_id" => $user->rank_id,
                                               "task_id"     => $task->id
                                           ]);

            $length = count($request->products);

            for ($i = 0; $i < $length; $i++) {
                $product = Product::query()->where("id", $request->products[$i])->first();

                TaskProduct::create([
                                        "task_id"      => $task->id,
                                        "name_product" => $product->name,
                                        "price"        => $product->price,
                                        "product_id"   => $product->id,
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
        $rule   = [
            'add_day' => 'required',
        ];
        $status = $request->status;
        $this->doValidate($request, $rule);


        $stylist = Stylist::query()
                          ->where('user_id', auth()->id())
                          ->first();

        return $this->model::query()
                           ->with('customer')
                           ->with('discount')
                           ->with('products')
                           ->with('image')
                           ->with('time')
                           ->where('stylist_id', $stylist->id)
                           ->whereDate('date', Carbon::today()->addDay($request->add_day))
                           ->when($status !== null, function ($q) use ($status) {
                               $q->where('status', $status);
                           })
                           ->paginate(10);
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
                            ->with('discount')
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
            "images"  => 'required|array|min:0|max:4',
            "task_id" => 'required|exists:tasks,id'
        ];

        $this->doValidate($request, $rule);
        try {
            DB::beginTransaction();
            $task = $this->model->find($request->task_id);
            if ($task->status == 1) {
                return [
                    "data"    => false,
                    "message" => "Can't update"
                ];
            }
            $task->status = 1;
            $task->save();
            $images = $request->file('images');

            $dataImages = [];
            foreach ($images as $key => $image) {
                $nameImageOriginal = $image->getClientOriginalName();
                $arrayNameImage    = explode('.', $nameImageOriginal);
                $fileExt           = end($arrayNameImage);
                $destinationPath   = './upload/task/';
                $nameImage         = 'Task-' . $key . $task['id'] . time() . '.' . $fileExt;
                $image->move($destinationPath, $nameImage);
                $dataImages[$key]['link']    = '/upload/task/' . $nameImage;
                $dataImages[$key]['task_id'] = $task->id;
            }

            $imageTask = new ImageTask();

            $imageTask::query()->insert($dataImages);

            (new BillService())->createBill($request);

            DB::commit();

            return [
                "data" => true
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function addVoucher(Request $request): array
    {
        $rule = [
            "discount_id" => 'required|exists:discounts,id',
            "task_id"     => 'required|exists:tasks,id'
        ];

        self::doValidate($request, $rule);

        $postsLastMonth = (new PostService())
                              ->getViaLastMonth($request)['data']['posts']
                              ->toArray()['data'];

        $post = null;
        if ($request->discount_id >= 3 && $request->discount_id <= 13 && count($postsLastMonth) >= $request->discount_id - 2) {
            $post = $postsLastMonth[$request->discount_id - 3];
        }

        if ($post == null || $post["is_awarded"] == 1) {
            return [
                "data"    => false,
                "message" => "Bài viết này đã được trao giải hoặc không phải chủ sở hữu. Không thể áp dụng Voucher"
            ];
        } else {
            $task = Task::query()->firstWhere("id", $request->task_id);

            if ($post['task']['customer_id'] == $task['customer_id']) {
                $discountTask = DiscountTasks::query()->create([
                                                                   "discount_id" => $request->discount_id,
                                                                   "task_id"     => $request->task_id,
                                                               ]);
            }

            Post::query()->firstWhere("id", $post['id'])->update([
                                                                     "is_awarded" => 1
                                                                 ]);

            return [
                "data" => !empty($discountTask)
            ];
        }
    }

    #[ArrayShape(["data" => "bool"])]
    public function deleteVoucher(Request $request): array
    {
        $rule = [
            "discount_id" => 'required|exists:discounts,id',
            "task_id"     => 'required|exists:tasks,id'
        ];

        self::doValidate($request, $rule);

        $postsLastMonth = (new PostService())
                              ->getViaLastMonth($request)['data']['posts']
                              ->toArray()['data'];

        $post = null;

        if ($request->discount_id >= 3 && $request->discount_id <= 13 && count($postsLastMonth) >= $request->discount_id - 2) {
            $post = $postsLastMonth[$request->discount_id - 3];

            Post::query()->firstWhere("id", $post['id'])->update([
                                                                     "is_awarded" => 0
                                                                 ]);
        }

        return [
            "data" => DiscountTasks::query()
                                   ->where("discount_id", $request->discount_id)
                                   ->where("task_id", $request->task_id)
                                   ->delete() == 1,
        ];

    }

    #[ArrayShape(["data" => "\Illuminate\Contracts\Pagination\LengthAwarePaginator"])]
    public function getHistory(Request $request): LengthAwarePaginator
    {
        return $this->model::query()
                           ->with('image')
                           ->with('products')
                           ->with('image')
                           ->with('time')
                           ->with("stylist", function ($query) {
                               $query->with('facility')
                                     ->with('user');
                           })
                           ->with('bill')
                           ->orderByDesc('tasks.created_at')
                           ->where('customer_id', auth()->id())
                           ->paginate(10);
    }

    public function deleteTask(Request $request): array
    {
        $rule = ["task_id" => 'required|exists:tasks,id'];

        self::doValidate($request, $rule);

        $task = $this->model::query()->where("id", $request->task_id)->first();

        DiscountTasks::query()->where("task_id", $task->id)->delete();

        if ($task->customer_id == auth()->id()) {
            return [
                "data" => $task->delete()
            ];
        }

        return [
            "data" => null
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection"])]
    public function cleanOldTask(): array
    {
        $now = Carbon::now();

        return [
            "data" => $this->model::query()
                                  ->where("customer_id", auth()->id())
                                  ->whereDay("date", "<", $now)
                                  ->where("status", 0)
                                  ->delete()
        ];
    }

    #[ArrayShape(["data" => "mixed"])]
    public function checkCanBook(): array
    {
        $taskWaiting = $this->model::query()
                                   ->where("customer_id", auth()->id())
                                   ->where("status", 0)
                                   ->first();

        return [
            "data" => empty($taskWaiting)
        ];
    }
}
