<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use YaangVu\LaravelBase\Services\impl\BaseService;

class RoleService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Role();
    }

    public function createRole(Request $request): Model|Builder
    {
        $rule = [
            'name' => 'required',
            'created_by' => 'required'
        ];
        $this->storeRequestValidate($request, $rule);
        return Role::create([
            'name' => $request['name'],
            "created_by" => $request["created_by"]
        ]);
    }

}
