<?php

namespace App\Http\Controllers;

use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $service;

    function __construct()
    {
        $this->service = new AuthService();
    }

    public function login(): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->service->login());
    }
}
