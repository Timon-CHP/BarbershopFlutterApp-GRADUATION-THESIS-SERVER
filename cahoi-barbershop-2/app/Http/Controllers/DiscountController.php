<?php

namespace App\Http\Controllers;

use App\Services\DiscountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class DiscountController extends BaseController
{
    public function __construct()
    {
        $this->service = new DiscountService();
        parent::__construct();
    }

    public function getViaCode(Request $request): JsonResponse
    {
        return response()->json($this->service->getViaCode($request));
    }
}
