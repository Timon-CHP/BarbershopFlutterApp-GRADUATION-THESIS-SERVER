<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class PostController extends BaseController
{
    public function __construct()
    {
        $this->service = new PostService();
        parent::__construct();
    }

    public function createPost(Request $request): JsonResponse
    {
        return response()->json($this->service->createPost($request));
    }

    public function getViaUserId(Request $request): JsonResponse
    {
        return response()->json($this->service->getViaUserId($request));
    }

    public function getViaMonth(Request $request): JsonResponse
    {
        return response()->json($this->service->getViaMonth($request));
    }

    public function deleteMyPost(Request $request): JsonResponse
    {
        return response()->json($this->service->deleteMyPost($request));
    }

    /**
     * @throws Exception
     */
    public function like(Request $request): JsonResponse
    {
        return response()->json($this->service->like($request));
    }
}
