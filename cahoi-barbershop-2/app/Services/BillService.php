<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Discount;
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
            "task_id"       => 'required|exists:tasks,id',
            "code_discount" => 'exists:discounts,code',
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

        if($request->code_discount)
        {
            $discount = Discount::query()->where('code', $request->code_discount)->first(['code', 'reduction']);
            $total = round($price * (1-$discount->reduction), 2);
        }

        $bill = Bill::create([
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
