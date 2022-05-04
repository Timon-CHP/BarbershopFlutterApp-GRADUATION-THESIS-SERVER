<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;
use YaangVu\LaravelBase\Services\impl\BaseService;

class ProductService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Product();
    }

    public function getViaTypeProductId(Request $request, $typeId): array
    {
        try {
            return [
                "data" => $this->model
                    ->where("type_product_id", $typeId)
                    ->get()
            ];
        } catch (Throwable $exception) {
            return [
                "data" => null,
                "message" => $exception->getMessage()
            ];
        }
    }
}
