<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Discount;
use App\Models\DiscountTasks;
use App\Models\TaskProduct;
use Illuminate\Http\Request;
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
            $d = Discount::query()->where("id", $discount->discount_id)->first();
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
}
