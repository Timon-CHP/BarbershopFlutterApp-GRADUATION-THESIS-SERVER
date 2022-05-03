<?php

namespace App\Http\Controllers;

use App\Services\FacilityService;
use YaangVu\LaravelBase\Controllers\BaseController;

class FacilityController extends BaseController
{
    public function __construct()
    {
        $this->service = new FacilityService();
        parent::__construct();
    }
}
