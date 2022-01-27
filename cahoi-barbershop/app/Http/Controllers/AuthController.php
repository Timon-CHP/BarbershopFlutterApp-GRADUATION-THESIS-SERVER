<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(UserRegister $request): JsonResponse
    {
        return response()->json($this->authService->register($request));
    }

    public function loginWithPhoneNumber(UserLogin $request): JsonResponse
    {
        return response()->json($this->authService->loginWithPhoneNumber($request));
    }

    public function loginWithSocials(Request $request, $typeLogin): JsonResponse
    {
        return response()->json($this->authService->loginWithSocials($request, $typeLogin));
    }

    public function logout(): JsonResponse
    {
        return response()->json($this->authService->logout());
    }

    public function checkUserExisted(string $phone_number): JsonResponse
    {
        return response()->json($this->authService->checkUserExisted($phone_number));
    }

    public function resetPassword(UserLogin $request): JsonResponse
    {
        return response()->json($this->authService->resetPassword($request));
    }
}
