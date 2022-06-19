<?php
/**
 * @Author lequa
 * @Date   Thg 6 19, 2022
 */

namespace App\Services;

use App\Models\Facility;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class RevenueService extends BaseService
{

    /**
     * @inheritDoc
     */
    function createModel(): void
    {
        $this->model = new Revenue();
    }

    #[ArrayShape(["data" => "bool"])]
    public function fetch(Request $request): array
    {
        $facilities = Facility::query()->pluck("id");

        foreach ($facilities as $facilityId) {
            $total   = (new BillService())->getTotalViaFacilityId($facilityId);
            $revenue = $this->model
                ->where("facility_id", $facilityId)
                ->whereYear("closing_at", Carbon::now())
                ->whereMonth("closing_at", Carbon::now())
                ->first();

            if ($revenue !== null) {
                $revenue->update([
                                     "total_revenue_month" => $total,
                                     "closing_at"          => Carbon::now()
                                 ]);
            } else {
                $this->model::query()->create([
                                                  "total_revenue_month" => $total,
                                                  "closing_at"          => Carbon::now(),
                                                  "facility_id"         => $facilityId
                                              ]);
            }

        }

        return [
            "data" => true
        ];
    }

    #[ArrayShape(["data" => "bool"])]
    public function paid(Request $request): array
    {
        $rule = [
            "revenue_id" => "required|exists:revenue,id"
        ];

        self::doValidate($request, $rule);

        return [
            "data" => $this->model
                ->firstWhere('id', $request->revenue_id)
                ->update([
                             "is_paid" => 1,
                         ])
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder"])]
    public function getViaMonth(Request $request): array
    {
        $rule = [
            "add_month" => "required"
        ];

        self::doValidate($request, $rule);

        return [
            "data" => $this->model::query()
                                  ->with("facility")
                                  ->whereYear("closing_at", '=', Carbon::now()->addMonths($request->add_month))
                                  ->whereMonth("closing_at", '=', Carbon::now()->addMonths($request->add_month))
                                  ->get()
        ];
    }
}