<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
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

    public function checkExist(Request $request): array
    {
        $rule = [
            "phone_number" => "required"
        ];

        $this->doValidate($request, $rule);

        $user = $this->model::query()
            ->where('phone_number', $request->phone_number)
            ->first();

        if (!$user) {
            return [
                "data" => false
            ];
        }

        return [
            "data" => true
        ];
    }
}
