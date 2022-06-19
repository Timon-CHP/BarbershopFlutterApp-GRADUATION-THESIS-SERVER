<?php
/**
 * @Author Tien
 * @Date   May 15, 2022
 */

namespace App\Services;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use YaangVu\LaravelBase\Services\impl\BaseService;

class ReportService extends BaseService
{

    function createModel(): void
    {
        $this->model = new Bill();
    }

    public function reportSalesViaMonth(int $month)
    {
        return $this->model::query()->join('tasks', 'tasks.id', '=', 'bills.task_id')
                           ->whereMonth('tasks.date', $month)
                           ->sum('bills.total');
    }

    public function reportSalesDaily(Request $request): Collection|array
    {
        $rules = [
            'facility_id' => 'required|exists:facilities,id',
            'date'        => 'required|date_format:Y-m-d'
        ];
        $this->doValidate($request, $rules);

        return (new Bill())::query()
                           ->join('tasks', 'tasks.id', '=', 'bills.task_id')
                           ->join('stylists', 'stylists.id', '=', 'tasks.stylist_id')
                           ->join('users', 'users.id', '=', 'stylists.user_id')
                           ->where('stylists.facility_id', $request->facility_id)
                           ->where('tasks.date', $request->date)
                           ->select('stylists.id', 'users.name', DB::raw('SUM(total) as total_sales'))
                           ->groupBy('stylists.id', 'users.name')
                           ->get();
    }
}