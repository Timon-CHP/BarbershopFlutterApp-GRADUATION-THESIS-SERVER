<?php

namespace App\Http\Controllers;

use App\Services\RevenueService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class RevenueController extends BaseController
{
    public function __construct()
    {
        $this->service = new RevenueService();
        parent::__construct();
    }

    public function fetch(Request $request): JsonResponse
    {
        return response()->json($this->service->fetch($request));
    }

    public function paid(Request $request): JsonResponse
    {
        return response()->json($this->service->paid($request));
    }

    public function getViaMonth(Request $request): JsonResponse
    {

        return response()->json($this->service->getViaMonth($request));
    }
}
