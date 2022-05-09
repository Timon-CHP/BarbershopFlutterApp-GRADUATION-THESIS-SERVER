<?php

namespace App\Services;

use App\Models\Stylist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;
use function Illuminate\Auth\getData;

class StylistService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Stylist();
    }

    /**
     * @param Request $request
     * @return Collection|array
     */
    public function getViaFacilityId(Request $request, $facilityId): Collection|array
    {
        $rule = [
            "date" => "required"
        ];

        $this->doValidate($request, $rule);

        $date = $request->date;
        return [
            "data" => $this->model::query()->with('user')
                ->join('calendar_stylist', 'calendar_stylist.stylist_id', '=', 'stylists.id')
                ->join('calendars', 'calendars.id', '=', 'calendar_stylist.calendar_id')
                ->join('facilities', 'facilities.id', '=', 'stylists.facility_id')
                ->where('stylists.facility_id', $facilityId)
                ->when($date, function ($q) use ($date) {
                    $q->whereDate('calendars.scheduled_start_at', $date);
                })
                ->select('stylists.*', 'calendar_stylist.*')
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
