<?php

namespace App\Http\Controllers;

use App\Services\TypeProductService;
use YaangVu\LaravelBase\Controllers\BaseController;

class TypeProductController extends BaseController
{
    public function __construct()
    {
        $this->service = new TypeProductService();
        parent::__construct();
    }
}
