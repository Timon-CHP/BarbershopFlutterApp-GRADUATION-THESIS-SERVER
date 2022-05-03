<?php

namespace App\Http\Controllers;

use App\Services\StylistService;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class StylistController extends BaseController
{
    public function __construct()
    {
        $this->service = new StylistService();
        parent::__construct();
    }

    public function getViaFacilityId(Request $request, $facilityId)
    {
        return response()->json($this->service->getViaFacilityId($facilityId));
    }
}
