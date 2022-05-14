<?php

namespace App\Services;

use App\Models\Stylist;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
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
        ];

        $this->storeRequestValidate($request, $rule);

        return ["data" => Role::create([
            "name" => $request["name"],
            "guard_name" => $request["name"],
            "created_by" => $request["created_by"]
        ])];
    }

    /**
     * @throws Exception
     */
    public function syncRoleViaUser(Request $request): array
    {
        $rule = [
            "user_id" => 'required|exists:users,id',
            "role_name" => 'required|exists:roles,name',
            "facility_id" => 'exists:facilities,id'
        ];

        $this->doValidate($request, $rule);
        DB::beginTransaction();
        try {
            if ($request->role_name == 'stylist') {
                $stylist = Stylist::query()->where('user_id', $request->user_id)->first();
                if (!$stylist) {
                    Stylist::query()->create(
                        [
                            'user_id' => $request->user_id,
                            'facility_id' => $request->facility_id,
                        ]
                    );
                } else {
                    $stylist->facility_id = $request->facility_id;
                    $stylist->save();
                }
            }

            $user = User::query()->find($request->user_id);

            if ($user) {
                $user->syncRoles($request->role_name);
                DB::commit();
                return [
                    "data" => true
                ];
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return [
            "data" => false
        ];
    }

    public function getAllExceptSuperAdmin(): LengthAwarePaginator
    {
        return $this->model::query()->whereNotIn('name', ['super-admin'])->paginate(10);
    }
}
