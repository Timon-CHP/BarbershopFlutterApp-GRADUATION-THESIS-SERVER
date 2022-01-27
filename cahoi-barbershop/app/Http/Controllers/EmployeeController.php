<?php

namespace App\Http\Controllers;

use App\Http\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    private EmployeeService $staffService;

    public function __construct(EmployeeService $staffService)
    {
        $this->staffService = $staffService;
    }

    public function getAll(): JsonResponse
    {
        return response()->json(
            $this->staffService->getAll(),
        );
    }

    public function getByPositionId($position_id): JsonResponse
    {
        return response()->json(
            $this->staffService->getByPositionId($position_id),
        );
    }

    public function getStylist($workplace_id): JsonResponse
    {
        return response()->json(
            $this->staffService->getStylist($workplace_id),
        );
    }

    public function getStylistByDate(Request $request, $workplace_id): JsonResponse
    {
        return response()->json(
            $this->staffService->getStylistByDate($request, $workplace_id),
        );
    }
}
