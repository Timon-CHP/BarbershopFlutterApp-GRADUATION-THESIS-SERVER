<?php

namespace App\Services;

use App\Models\Discount;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use YaangVu\LaravelBase\Services\impl\BaseService;

class DiscountService extends BaseService
{

    /**
     * @inheritDoc
     */
    function createModel(): void
    {
        $this->model = new Discount();
    }

    #[ArrayShape(['data' => "\Illuminate\Database\Eloquent\Builder"])]
    public function getViaCode(Request $request): LengthAwarePaginator
    {
        $rule = [
            'discount_code' => ''
        ];
        $this->doValidate($request, $rule);

        return $this->model::query()
                           ->where('code', 'LIKE', '%' . $request->discount_code . '%')
                           ->where('id', '<>', 1)
                           ->where('id', '<>', 2)
                           ->paginate(10);
    }
}
