<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use YaangVu\LaravelBase\Controllers\BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->service = new UserService();
        parent::__construct();
    }
}
