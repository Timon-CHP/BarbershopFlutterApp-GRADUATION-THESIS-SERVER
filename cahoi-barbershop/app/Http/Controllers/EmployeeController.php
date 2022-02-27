<?php

namespace App\Http\Controllers;

use App\Http\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function getAll(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'errorCode' => 0,
            'message' => '',
            'data' => $this->employeeService->getAll(),
        ]);
    }

    public function getByPositionId($position_id): JsonResponse
    {
        return response()->json(
            $this->employeeService->getByPositionId($position_id),
        );
    }

    public function getStylist($workplace_id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'errorCode' => 0,
            'message' => '',
            'data' => $this->employeeService->getStylist($workplace_id),
        ]);
    }

    public function getStylistByDate(Request $request, $workplace_id): JsonResponse
    {
        return response()->json(
            $this->employeeService->getStylistByDate($request, $workplace_id)
        );
    }
}
