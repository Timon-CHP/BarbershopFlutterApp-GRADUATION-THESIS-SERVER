<?php

namespace App\Http\Controllers;

use App\Http\Services\WorkplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkplaceController extends Controller
{
    private WorkplaceService $workPlaceService;

    public function __construct(WorkplaceService $workPlaceService)
    {
        $this->workPlaceService = $workPlaceService;
    }

    public function getAll(): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'errorCode' => 0,
                'message' => '',
                'data' => $this->workPlaceService->getAll(),
            ]
        );
    }
}
