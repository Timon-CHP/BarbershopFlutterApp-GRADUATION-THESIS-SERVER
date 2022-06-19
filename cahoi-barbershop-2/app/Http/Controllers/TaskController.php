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

    public function getTaskViaDay(Request $request): JsonResponse
    {
        return response()->json($this->service->getTaskViaDay($request));
    }

    public function getDetail(Request $request): JsonResponse
    {
        return response()->json($this->service->getDetail($request));
    }

    public function getHistory(Request $request): JsonResponse
    {
        return response()->json($this->service->getHistory($request));
    }

    public function deleteTask(Request $request): JsonResponse
    {
        return response()->json($this->service->deleteTask($request));
    }

    /**
     * @throws Exception
     */
    public function updateStatus(Request $request): JsonResponse
    {
        return response()->json($this->service->updateStatus($request));
    }

    public function addVoucher(Request $request): JsonResponse
    {
        return response()->json($this->service->addVoucher($request));
    }

    public function deleteVoucher(Request $request): JsonResponse
    {
        return response()->json($this->service->deleteVoucher($request));
    }

    public function cleanOldTask(Request $request): JsonResponse
    {
        return response()->json($this->service->cleanOldTask($request));
    }

    public function checkCanBook(Request $request): JsonResponse
    {
        return response()->json($this->service->checkCanBook($request));
    }
}
