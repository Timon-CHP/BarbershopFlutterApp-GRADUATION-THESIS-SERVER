<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class TaskController extends BaseController
{
    public function __construct()
    {
        $this->service = new TaskService();
        parent::__construct();
    }

    public function createTask(Request $request): JsonResponse
    {
        return response()->json($this->service->createTask($request));
    }

    /**
     * @throws Exception
     */
    public function updateStatus(Request $request): JsonResponse
    {
        return response()->json($this->service->updateStatus($request));
    }
}
