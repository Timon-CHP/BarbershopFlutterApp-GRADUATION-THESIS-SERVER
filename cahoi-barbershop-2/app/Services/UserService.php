<?php

namespace App\Services;

use App\Models\User;
use YaangVu\LaravelBase\Services\impl\BaseService;

class UserService extends BaseService
{
    function createModel(): void
    {
        $this->model = new User();
    }
}
