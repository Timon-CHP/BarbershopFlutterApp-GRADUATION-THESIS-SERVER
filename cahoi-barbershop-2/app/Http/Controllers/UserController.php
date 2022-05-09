<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->service = new UserService();
        parent::__construct();
    }

    public function me(): JsonResponse
    {
        return response()->json($this->service->me());
    }

    public function checkExist(Request $request): JsonResponse
    {
        return response()->json($this->service->checkExist($request));
    }
}
