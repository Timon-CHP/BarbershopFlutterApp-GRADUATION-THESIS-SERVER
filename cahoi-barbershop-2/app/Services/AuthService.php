<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Services\impl\BaseService;


class AuthService extends BaseService
{

    function createModel(): void
    {
        $this->model = new User();
    }

    public function login()
    {
        dd(1);
    }

    public function register(Request $request)
    {

    }
}
