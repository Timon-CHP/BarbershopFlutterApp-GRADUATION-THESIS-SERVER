<?php

namespace App\Services;

use App\Models\Facility;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class FacilityService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Facility();
    }

    #[ArrayShape(["data" => "mixed"])]
    public function getViaUserId(Request $request): array
    {
        $rule = [
            "user_id" => 'required|exists:users,id'
        ];
        self::doValidate($request, $rule);
        return [
            "data" => $this->model::query()
                ->join('stylists', 'facilities.id', '=', 'stylists.facility_id')
                ->where('stylists.user_id', $request->user_id)
                ->select('facilities.*')
                ->first()
        ];
    }
}
