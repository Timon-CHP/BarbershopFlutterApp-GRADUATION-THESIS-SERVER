<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->service = new ProductService();
        parent::__construct();
    }

    public function getViaTypeProductId(Request $request, $typeId): JsonResponse
    {
        return response()->json($this->service->getViaTypeProductId($request, $typeId));
    }
}
