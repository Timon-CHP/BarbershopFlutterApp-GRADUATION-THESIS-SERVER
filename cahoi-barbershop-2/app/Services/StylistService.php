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
        $this->doValidate($request, $rules);
        $stylistIds = $this->model::query()->with('user')
                                  ->join('calendar_stylist', 'calendar_stylist.stylist_id', '=', 'stylists.id')
                                  ->join('calendars', 'calendars.id', '=', 'calendar_stylist.calendar_id')
                                  ->join('facilities', 'facilities.id', '=', 'stylists.facility_id')
                                  ->where('stylists.facility_id', $facilityId)
                                  ->whereDate('calendars.scheduled_start_at', $request->date)
                                  ->pluck('stylists.id')
                                  ->toArray();

        return [
            "data" => $this->model::query()
                                  ->join('users','users.id','=','stylists.user_id')
                                  ->join('tasks', 'tasks.stylist_id', '=', 'stylists.id')
                                  ->join('ratings', 'ratings.task_id', '=', 'tasks.id')
                                  ->whereIn('stylists.id', $stylistIds)
                                  ->select(
                                      DB::raw('round(AVG(communication_rate),1) as avg_communication_rate'),
                                      DB::raw('round(AVG(skill_rate),1) as avg_skill_rate'),
                                      'stylists.id','users.name','users.avatar'
                                  )
                                  ->groupBy('stylists.id','users.name','users.avatar')
                                  ->get()
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
