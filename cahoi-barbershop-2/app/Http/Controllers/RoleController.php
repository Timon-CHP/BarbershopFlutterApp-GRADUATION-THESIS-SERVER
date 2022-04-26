<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleService $service;

    function __construct()
    {
        $this->service = new RoleService();
    }

    public function createRole(Request $request)
    {

        return response()->json($this->service->createRole($request));
    }
}
