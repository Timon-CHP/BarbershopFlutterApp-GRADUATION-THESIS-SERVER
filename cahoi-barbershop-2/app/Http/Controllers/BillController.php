<?php

namespace App\Http\Controllers;

use App\Services\BillService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class BillController extends BaseController
{
    public function __construct()
    {
        $this->service = new BillService();
        parent::__construct();
    }

    public function createBill(Request $request): JsonResponse
    {
        return response()->json($this->service->createBill($request));
    }

    public function getSpentLast6Months(Request $request): JsonResponse
    {
        return response()->json($this->service->getSpentLast6Months($request));
    }
}
