<?php

namespace App\Services;

use App\Models\Facility;
use YaangVu\LaravelBase\Services\impl\BaseService;

class FacilityService extends BaseService
{
    function createModel(): void
    {
        $this->model = new Facility();
    }
}
