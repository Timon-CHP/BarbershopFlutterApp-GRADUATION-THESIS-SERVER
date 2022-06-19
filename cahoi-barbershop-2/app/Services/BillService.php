<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Discount;
use App\Models\DiscountTasks;
use App\Models\TaskProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class BillService extends BaseService
{
    /**
     * @inheritDoc
     */
    function createModel(): void
    {
        $this->model = new Bill();
    }

    function createBill(Request $request): array
    {
        $rule = [
            "task_id" => 'required|exists:tasks,id'
        ];

        $this->doValidate($request, $rule);

        $products = TaskProduct::query()
                               ->join('products', 'products.id', '=', 'task_products.product_id')
                               ->where('task_id', $request->task_id)
                               ->select('products.name', 'products.price',)
                               ->get();

        $price = 0;
        foreach ($products as $product) {
            $price += $product->price;
        }
        $total = $price;

        $discounts = DiscountTasks::query()->where("task_id", $request->task_id)->get();

        $sumReduction = 0;

        foreach ($discounts as $discount) {
            $d            = Discount::query()->where("id", $discount->discount_id)->first();
            $sumReduction += $d->reduction;
        }

        $total = round($price * (1 - $sumReduction), 2);


        $bill = Bill::query()->create([
                                          'total'   => $total,
                                          'task_id' => $request->task_id,
                                      ]);

        return [
            "data" => [
                "product"     => $products,
                "reduction"   => $discount ?? null,
                "total_price" => $bill->total,
            ]
        ];
    }

    #[ArrayShape(["data" => "mixed"])]
    public function getSpentLast6Months(): array
    {
        return [
            "data" => $this->model::query()
                                  ->join("tasks", 'tasks.id', '=', "bills.task_id")
                                  ->where("customer_id", auth()->id())
                                  ->where("bills.created_at", '>=', Carbon::now()->subMonths(6))
                                  ->pluck('bills.total')
                                  ->sum()
        ];
    }

    public function getTotalViaFacilityId($facilityId)
    {
        return $this->model::query()
                           ->join("tasks", 'tasks.id', '=', "bills.task_id")
                           ->join("stylists", 'stylists.id', '=', "tasks.stylist_id")
                           ->join("facilities", 'facilities.id', '=', "stylists.facility_id")
                           ->where("facilities.id", $facilityId)
                           ->where("facilities.id", $facilityId)
                           ->whereYear("bills.created_at", Carbon::now())
                           ->whereMonth("bills.created_at", Carbon::now())
                           ->pluck('bills.total')
                           ->sum();
    }
}
