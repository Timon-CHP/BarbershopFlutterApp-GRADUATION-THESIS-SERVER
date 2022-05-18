<?php

namespace App\Services;

use App\Models\Stylist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class StylistService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Stylist();
    }

    #[ArrayShape(["data" => "array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection"])]
    public function getViaFacility(Request $request, $facilityId): Collection|array
    {
        $rules = [
            'date' => 'required|date_format:Y-m-d'
        ];

        self::doValidate($request, $rules);

        $ratingSV = new RatingService();

        return [
            "data" => $ratingSV->getRatingViaStylist($request, $facilityId)
        ];

    }

    #[ArrayShape(["data" => "mixed"])]
    public function getRatingViaStylistId(int $stylistId): array
    {
        return [
            "data" => $this->model::query()
                                  ->join('tasks', 'tasks.stylist_id', '=', 'stylists.id')
                                  ->join('ratings', 'ratings.task_id', '=', 'tasks.id')
                                  ->where('stylists.id', $stylistId)
                                  ->select(
                                      DB::raw('round(AVG(communication_rate),1) as avg_communication_rate'),
                                      DB::raw('round(AVG(skill_rate),1) as avg_skill_rate')
                                  )
                                  ->first()
        ];
    }
}
