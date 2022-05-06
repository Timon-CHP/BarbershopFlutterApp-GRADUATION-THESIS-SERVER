<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Services\impl\BaseService;
use function Illuminate\Auth\getData;

class ProductService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Product();
    }

    public function getViaTypeProductId(Request $request, $typeId): array
    {
        return [
            "data" => $this->model
                ->where("type_product_id", $typeId)
                ->get()
        ];
    }
}
