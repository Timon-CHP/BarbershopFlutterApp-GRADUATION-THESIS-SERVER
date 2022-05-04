<?php

namespace App\Services;

use App\Models\TypeProduct;
use YaangVu\LaravelBase\Services\impl\BaseService;

class TypeProductService extends BaseService
{
    function createModel(): void
    {
        $this->model = new TypeProduct();
    }
}
