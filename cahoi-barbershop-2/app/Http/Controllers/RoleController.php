<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class RoleController extends BaseController
{
    function __construct()
    {
        $this->service = new RoleService();
        parent::__construct();
    }

    public function createRole(Request $request): JsonResponse
    {
        return response()->json($this->service->createRole($request));
    }
}
