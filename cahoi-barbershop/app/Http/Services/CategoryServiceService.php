<?php

namespace App\Http\Services;

use App\Models\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryServiceService
{
    public function getAll(): JsonResponse
    {
        return response()->json(CategoryService::all(['id', 'name']));
    }
}
