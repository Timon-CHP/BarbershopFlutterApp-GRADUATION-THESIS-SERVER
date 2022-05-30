<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

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
            "data" => $this->model::query()
                                  ->with('roles')
                                  ->with('rank')
                                  ->find(auth()->id())
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

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection"])]
    public function searchUser(Request $request): LengthAwarePaginator
    {
        return $this->model::query()->with("roles")
                           ->where('name', 'LIKE', '%' . $request->search_string . '%')
                           ->where('id', '<>', auth()->id())
                           ->paginate(10);
    }

    #[ArrayShape(["data" => "bool"])]
    public function checkPassword(Request $request): array
    {
        $rule = [
            "password" => 'required',
        ];

        self::doValidate($request, $rule);
        $user = $this->model->where('id', auth()->id())->first();

        return [
            "data" => Hash::check($request['password'], $user->password)
        ];
    }

    #[ArrayShape(["data" => "bool"])]
    public function changePassword(Request $request): array
    {
        $rule = [
            "password" => 'required',
        ];

        self::doValidate($request, $rule);
        $user = $this->model->where('id', auth()->id())->first();


        return [
            "data" => $user->update(["password" => Hash::make($request['password'])])
        ];
    }
}
