<?php

namespace App\Http\Controllers;

use App\Services\TimeSlotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class TimeSlotController extends BaseController
{
    public function __construct()
    {
        $this->service = new TimeSlotService();
        parent::__construct();
    }

    public function getTimeSlot(): JsonResponse
    {
        return response()->json($this->service->getTimeSlot());
    }

    public function getTimeSlotViaStylistId(Request $request, $stylistId): JsonResponse
    {
        return response()->json($this->service->getTimeSlotViaStylistId($request, $stylistId));
    }
}
