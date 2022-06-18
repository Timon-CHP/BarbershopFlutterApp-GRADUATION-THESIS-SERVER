<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
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

    public function searchUser(Request $request): JsonResponse
    {
        return response()->json($this->service->searchUser($request));
    }

    public function checkExist(Request $request): JsonResponse
    {
        return response()->json($this->service->checkExist($request));
    }

    public function checkPassword(Request $request): JsonResponse
    {
        return response()->json($this->service->checkPassword($request));
    }

    public function changePassword(Request $request): JsonResponse
    {
        return response()->json($this->service->changePassword($request));
    }

    /**
     * @throws Exception
     */
    public function changeAvatar(Request $request): JsonResponse
    {
        return response()->json($this->service->changeAvatar($request));
    }
}
