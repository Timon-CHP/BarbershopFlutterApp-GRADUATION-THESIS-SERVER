<?php

namespace App\Http\Services;

use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DBServiceService
{
    public function getByCategoryId(Request $request, $id)
    {
        return Service::where('category_service_id', $id)->get();
    }
}
