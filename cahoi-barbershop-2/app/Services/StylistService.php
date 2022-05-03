<?php

namespace App\Services;

use App\Models\Stylist;
use Throwable;
use YaangVu\LaravelBase\Services\impl\BaseService;

class StylistService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Stylist();
    }

    public function getViaFacilityId($facilityId): array
    {
        try {
            return [
                "data" => $this->model->with('tasks')->get()
//                    ->join('users', 'users.id', '=', 'stylists.user_id')
//                    ->where('facility_id', $facilityId)
//                    ->select('stylists.id')
//                    ->get()
            ];
        } catch (Throwable $exception) {
            return [
                "data" => null,
                "message" => $exception->getMessage()
            ];
        }
    }
}
