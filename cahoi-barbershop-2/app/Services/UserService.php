<?php

namespace App\Services;

use App\Models\User;
use JetBrains\PhpStorm\ArrayShape;
use Throwable;
use YaangVu\LaravelBase\Services\impl\BaseService;
use function Illuminate\Auth\getData;

class UserService extends BaseService
{
    function createModel(): void
    {
        $this->model = new User();
    }

    #[ArrayShape(["data" => "\Illuminate\Contracts\Auth\Authenticatable|null"])]
    public function me(): array
    {
        return [
            "data" => auth()->user(),
        ];
    }

    public function checkExist($phoneNumber): array
    {
        $user = $this->getByPhoneNumber($phoneNumber);

        if ($user['data'] != null) {
            return [
                "data" => true
            ];
        }
        return [
            "data" => false
        ];
    }

    public function getByPhoneNumber($phoneNumber): array
    {
        try {
            return [
                "data" => $this->model->where('phone_number', '=', $phoneNumber)
            ];
        } catch (Throwable $exception) {
            return [
                'data' => null,
                'message' => $exception->getMessage()
            ];
        }
    }
}
