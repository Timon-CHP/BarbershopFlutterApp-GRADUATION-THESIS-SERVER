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
use JetBrains\PhpStorm\ArrayShape;
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
                           ->join("tasks", "tasks.id", "=", "ratings.task_id")
                           ->rightJoin("stylists", "stylists.id", "=", "tasks.stylist_id")
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

    #[ArrayShape(["data" => "null"])]
    public function getViaTaskId(Request $request, $taskId): array
    {
        return [
            "data" => $this->model::query()->where("task_id", $taskId)->first()
        ];
    }

    public function createViaTaskId(Request $request): array
    {
        $rule = [
            'communication_rate' => 'min:0|max:5',
            'skill_rate'         => 'min:0|max:5',
            'assessment'         => 'min:0|max:5',
            'secure'             => 'min:0|max:5',
            'checkout'           => 'min:0|max:5',
            'task_id'            => 'required|exists:tasks,id',
        ];

        self::doValidate($request, $rule);

        return [
            "data" => $this->model::query()->create([
                                                        'communication_rate' => $request->communication_rate,
                                                        'skill_rate'         => $request->skill_rate,
                                                        'assessment'         => $request->assessment,
                                                        'secure'             => $request->secure,
                                                        'checkout'           => $request->checkout,
                                                        'comment'            => $request->comment,
                                                        'task_id'            => $request->task_id
                                                    ])
        ];
    }

}