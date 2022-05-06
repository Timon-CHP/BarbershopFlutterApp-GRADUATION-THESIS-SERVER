<?php

namespace App\Http\Controllers;

use App\Services\StylistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class StylistController extends BaseController
{
    public function __construct()
    {
        $this->service = new StylistService();
        parent::__construct();
    }

    public function getViaFacilityId(Request $request, $facilityId): JsonResponse
    {
        return response()->json($this->service->getViaFacilityId($request, $facilityId));
    }

    public function getRatingViaStylistId(Request $request, $stylistId): JsonResponse
    {
        return response()->json($this->service->getRatingViaStylistId($stylistId));
    }
}
