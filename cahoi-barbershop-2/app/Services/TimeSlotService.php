<?php

namespace App\Services;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class TimeSlotService extends BaseService
{

    /**
     * @inheritDoc
     */
    function createModel(): void
    {
        $this->model = new TimeSlot();
    }

    public function getTimeSlotViaStylistId(Request $request, $stylistId)
    {
        $rule = [
            'date' => 'required'
        ];

        $this->doValidate($request, $rule);

        return [
            "data" => $this->model::query()
                ->join('tasks', 'tasks.time_slot_id', '=', 'time_slots.id')
                ->where('tasks.stylist_id', $stylistId)
                ->whereDate('tasks.date', $request->date)
                ->select('time_slots.id', 'time_slots.time')
                ->groupBy('id', 'time')
                ->get()
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]"])]
    public function getTimeSlot(): array
    {
        return [
            "data" => $this->model->get()
        ];
    }
}
