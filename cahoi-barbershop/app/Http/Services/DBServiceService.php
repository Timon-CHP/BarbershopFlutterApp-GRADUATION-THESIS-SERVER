<?php

namespace App\Http\Services;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class DBServiceService
{
    public function getByCategoryId($id): JsonResponse
    {
        return response()->json(Service::all()->where('id',$id));
    }
}
