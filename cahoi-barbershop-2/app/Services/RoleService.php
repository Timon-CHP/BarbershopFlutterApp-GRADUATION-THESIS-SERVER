<?php

namespace App\Services;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Throwable;
use YaangVu\LaravelBase\Services\impl\BaseService;

class RoleService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Role();
    }

    public function createRole(Request $request): array
    {
        $rule = [
            'name' => 'required',
//            'created_by' => 'required'
        ];

        $this->storeRequestValidate($request, $rule);

        try {
            return ["data" => Role::create([
                "name" => $request["name"],
                "guard_name" => $request["name"],
                "created_by" => $request["created_by"]
            ])];
        } catch (Throwable $ex) {
            return [
                "data" => null,
                "message" => $ex->getMessage()
            ];
        }
    }

}
