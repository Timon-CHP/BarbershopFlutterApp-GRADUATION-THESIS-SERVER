<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $service;

    function __construct()
    {
        $this->service = new AuthService();
    }

    public function loginWithPhoneNumber(Request $request): JsonResponse
    {
        return response()->json($this->service->loginWithPhoneNumber($request));
    }

    public function me(): JsonResponse
    {
        return response()->json($this->service->me());
    }

    public function register(Request $request): JsonResponse
    {
        return response()->json(data: $this->service->register($request));
    }
}
