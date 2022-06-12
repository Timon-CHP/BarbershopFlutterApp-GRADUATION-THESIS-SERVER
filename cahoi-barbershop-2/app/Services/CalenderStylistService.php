<?php
/**
 * @Author lequa
 * @Date   Thg 6 09, 2022
 */

namespace App\Services;

use App\Models\CalendarStylist;
use YaangVu\LaravelBase\Services\impl\BaseService;

class CalenderStylistService extends BaseService
{

    /**
     * @inheritDoc
     */
    function createModel(): void
    {
        $this->model = new CalendarStylist();
    }
}