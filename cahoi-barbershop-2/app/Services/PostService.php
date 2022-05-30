<?php

namespace App\Services;

use App\Models\Like;
use App\Models\Post;
use App\Models\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
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
                'data'    => null,
                'message' => 'you are not authorized to do'
            ];
        }

        $post = $this->model
            ->where("task_id", $request->task_id)->first();

        if (!$post) {
            $post = $this->model->create([
                                             'captions' => $request->captions,
                                             'task_id'  => $request->task_id,
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
                'data'    => null,
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

    #[ArrayShape(["data" => "array"])]
    public function getViaMonth(Request $request): array
    {
        $posts = $this->model::query()
                             ->with("task", function ($query) {
                                 $query
                                     ->with("customer")
                                     ->with("stylist", function ($query) {
                                         $query->with("user");
                                     })
                                     ->with("image")
                                     ->get();
                             })
                             ->whereMonth('public_at', Carbon::today())
                             ->orderByDesc('like_count');

        return [
            "data" => [
                "posts"     => $posts->paginate(10),
                "likedPost" => $this->likedViaPosts($posts, auth()->id())
            ]
        ];
    }

    public function likedViaPosts($posts, $userId): Collection|array
    {
        $postsId = $posts
            ->pluck("posts.id")
            ->toArray();

        return Like::query()
                   ->whereIn("post_id", $postsId)
                   ->where("user_id", $userId)
                   ->pluck("post_id")
                   ->toArray();
    }


    #[ArrayShape(["data" => "array"])]
    public function getViaUserId(Request $request): array
    {
        $rule = [
            "user_id" => 'required|exists:users,id'
        ];

        $this->doValidate($request, $rule);

        $posts = $this->model::query()
                             ->with("task", function ($query) {
                                 $query
                                     ->with("customer")
                                     ->with("stylist", function ($query) {
                                         $query->with("user");
                                     })
                                     ->with("image")
                                     ->get();
                             })
                             ->whereIn("posts.task_id", $this->model::query()
                                                                    ->join("tasks", "tasks.id", "=", "posts.task_id")
                                                                    ->where("tasks.customer_id", $request->user_id)
                                                                    ->pluck("tasks.id")
                                                                    ->toArray())
                             ->orderByDesc('public_at');

        return [
            "data" => [
                "posts"     => $posts->paginate(10),
                "likedPost" => $this->likedViaPosts($posts, $request->user_id)
            ]
        ];
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

    public function updateMyPost(Request $request)
    {
        $rule = [
            "post_id" => 'required|exists:posts,id'
        ];

        self::doValidate($request, $rule);

        $post = $this->model::query()
                            ->join("tasks", "tasks.id", "=", "posts.task_id")
                            ->where("posts.id", $request->post_id);

        // return [
        //     "data" => $post->first()
        // ];
        if ($post->first()->customer_id != auth()->id()) {
            return [
                "data" => false
            ];
        }

        $post->update(["captions" => $request->captions]);

        return [
            "data" => true
        ];
    }
}
