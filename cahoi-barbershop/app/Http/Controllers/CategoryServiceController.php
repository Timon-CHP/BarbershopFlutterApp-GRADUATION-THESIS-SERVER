<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceService;
use Illuminate\Http\JsonResponse;

class CategoryServiceController extends Controller
{
    private CategoryServiceService $categorySService;

    public function __construct(CategoryServiceService $categoryService)
    {
        $this->categorySService = $categoryService;
    }

    public function getAll(): JsonResponse
    {
        return response()->json($this->categorySService->getAll());
    }
}
