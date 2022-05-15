<?php

namespace App\Services;

use App\Models\Like;
use App\Models\Post;
use App\Models\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class PostService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Post();
    }

    function createPost(Request $request): array
    {
        $rule = [
            "task_id" => 'required|exists:tasks,id'
        ];

        $this->doValidate($request, $rule);

        $task = Task::query()->where('id', $request->task_id)->first();

        if (auth()->id() != $task->customer_id) {
            return [
                'data' => null,
                'message' => 'you are not authorized to do'
            ];
        }

        $post = $this->model
            ->where("task_id", $request->task_id)->first();

        if (!$post) {
            $post = $this->model->create([
                'captions' => $request->captions,
                'task_id' => $request->task_id,
            ]);
        }

        return [
            'data' => $post
        ];
    }

    function deleteMyPost(Request $request): array
    {
        $rule = [
            "post_id" => 'required|exists:posts,id'
        ];

        $this->doValidate($request, $rule);

        $post = $this->model
            ->join('tasks', 'tasks.id', '=', 'posts.task_id')
            ->where('posts.id', $request->post_id)->first();

        if (auth()->id() != $post->customer_id) {
            return [
                'data' => null,
                'message' => 'you are not authorized to do'
            ];
        }

        $this->model
            ->where('id', $request->post_id)
            ->delete();

        return [
            'data' => true
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]"])]
    public function getViaMonth(Request $request): LengthAwarePaginator
    {
        return $this->model::query()
            ->with('task', function ($query) {
                $query->with('customer')
                    ->with('stylist')
                    ->with("image");
            })
            ->whereMonth('public_at', Carbon::today())
            ->where('deleted_at', null)
            ->orderByDesc('like_count')
            ->paginate(10);
    }

    public function getViaUserId(Request $request)
    {
        $rule = [
            "user_id" => 'required|exists:users,id'
        ];


        $this->doValidate($request, $rule);

        return $this->model::query()
            ->with('task', function ($query) use ($request) {
                $query->with('customer')
                    ->with('stylist')
                    ->with("image")
                    ->where('customer_id', $request->user_id);
            })
            ->where('deleted_at', null)
            ->orderByDesc('public_at')
            ->paginate(10);
    }

    /**
     * @throws Exception
     */
    #[ArrayShape(['data' => "bool"])]
    public function like(Request $request): array
    {
        $rule = [
            "post_id" => 'required|exists:posts,id'
        ];

        $this->doValidate($request, $rule);

        $like = Like::query()
            ->where("post_id", $request->post_id)
            ->where('user_id', auth()->id())
            ->first();

        DB::beginTransaction();
        try {
            if (!$like) {
                Like::create([
                    'post_id' => $request->post_id,
                    'user_id' => auth()->id()
                ]);


                $like_count = Like::query()
                    ->where('post_id', $request->post_id)
                    ->count();

                $this->model
                    ->find($request->post_id)->update([
                        "like_count" => $like_count
                    ]);
                DB::commit();
                return [
                    'data' => true
                ];
            } else {
                Like::query()
                    ->where("post_id", $request->post_id)
                    ->where('user_id', auth()->id())
                    ->delete();

                $like_count = Like::query()
                    ->where('post_id', $request->post_id)
                    ->count();

                $this->model
                    ->find($request->post_id)->update([
                        "like_count" => $like_count
                    ]);
                DB::commit();
                return [
                    'data' => false
                ];
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage(), 400);
        }
    }
}
