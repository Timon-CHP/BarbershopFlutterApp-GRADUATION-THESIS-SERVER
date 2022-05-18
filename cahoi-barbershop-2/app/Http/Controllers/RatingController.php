<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class RatingController extends BaseController
{
    public function __construct() {
        $this->service = new RatingService();
        parent::__construct();
    }
}
