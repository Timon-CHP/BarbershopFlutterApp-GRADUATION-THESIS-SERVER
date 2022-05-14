<?php

namespace App\Http\Controllers;

use App\Services\FacilityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class FacilityController extends BaseController
{
    public function __construct()
    {
        $this->service = new FacilityService();
        parent::__construct();
    }

    public function getViaUserId(Request $request): JsonResponse
    {
        return response()->json($this->service->getViaUserId($request));
    }

}
