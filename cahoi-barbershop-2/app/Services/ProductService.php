<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;
use function Illuminate\Auth\getData;

class ProductService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Product();
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]"])]
    public function getViaTypeProductId(Request $request, $typeId): array
    {
        return [
            "data" => $this->model
                ->where("type_product_id", $typeId)
                ->get()
        ];
    }

    #[ArrayShape(["data" => "\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]"])]
    public function getProduct(): array
    {
        return [
            "data" => (new TypeProductService())->model::query()
                                                       ->with("products")
                                                       ->get()
        ];
    }


}
