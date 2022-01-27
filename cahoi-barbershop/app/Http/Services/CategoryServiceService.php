<?php

namespace App\Http\Services;

use App\Models\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CategoryServiceService
{
    public function getAll(): Collection|array
    {
        return CategoryService::all(['id', 'name']);
    }
}
