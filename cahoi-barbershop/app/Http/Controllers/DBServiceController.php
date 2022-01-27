<?php

namespace App\Http\Controllers;

use App\Http\Services\DBServiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DBServiceController extends Controller
{
    private DBServiceService $dbService;

    public function __construct(DBServiceService $dbService)
    {
        $this->dbService = $dbService;
    }

    public function getByCategoryServiceId(Request $request, $categoryServiceId): JsonResponse
    {
        return response()->json($this->dbService->getByCategoryId($request,$categoryServiceId));
    }
}
