<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class RatingController extends BaseController
{
    public function __construct()
    {
        $this->service = new RatingService();
        parent::__construct();
    }

    public function getViaTaskId(Request $request, $taskId): JsonResponse
    {
        return response()->json($this->service->getViaTaskId($request, $taskId));
    }

    public function createViaTaskId(Request $request): JsonResponse
    {
        return response()->json($this->service->createViaTaskId($request));
    }
}
