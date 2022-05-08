<?php

namespace App\Services;

use App\Models\Discount;
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
    public function getViaCode(Request $request): array
    {
        $rule = [
            'discount_code' => 'required'
        ];
        $this->doValidate($request, $rule);

        return [
            'data' => $this->model::query()
                ->where('code', $request->discount_code)
                ->get()
        ];
    }
}
