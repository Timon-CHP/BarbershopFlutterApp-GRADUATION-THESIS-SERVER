<?php
/**
 * @Author lequa
 * @Date   Thg 5 18, 2022
 */

namespace App\Services;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use YaangVu\LaravelBase\Services\impl\BaseService;

class RatingService extends BaseService
{

    /**
     * @inheritDoc
     */
    function createModel(): void
    {
        $this->model = new Rating();
    }

    public function getRatingViaStylist(Request $request, $facilityId): Collection|array
    {
        $date = $request->date;

        return $this->model::query()
                           ->rightJoin("tasks", "tasks.id", "=", "ratings.task_id")
                           ->leftJoin("stylists", "stylists.id", "=", "tasks.stylist_id")
                           ->leftJoin('calendar_stylist', 'calendar_stylist.stylist_id', '=', 'stylists.id')
                           ->leftJoin("calendars", "calendar_stylist.calendar_id", "=", "calendars.id")
                           ->leftJoin("users", "users.id", "=", "stylists.user_id")
                           ->where("stylists.facility_id", $facilityId)
                           ->whereDate("calendars.scheduled_start_at", $date)
                           ->select(
                               "users.name",
                               "stylists.id",
                               "users.avatar",
                               DB::raw('round(AVG(communication_rate),1) as communication'),
                               DB::raw('round(AVG(skill_rate),1) as skill')
                           )
                           ->groupBy(
                               "users.name",
                               "stylists.id",
                               "users.avatar",
                           )
                           ->get();
    }

}