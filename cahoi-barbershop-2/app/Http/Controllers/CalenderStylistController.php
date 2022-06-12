<?php

namespace App\Http\Controllers;

use App\Services\CalenderStylistService;
use YaangVu\LaravelBase\Controllers\BaseController;

class CalenderStylistController extends BaseController
{
    public function __construct()
    {
        $this->service = new CalenderStylistService();
        parent::__construct();
    }
}
