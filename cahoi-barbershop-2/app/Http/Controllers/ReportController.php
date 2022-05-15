<?php
/**
 * @Author Tien
 * @Date   May 15, 2022
 */

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Controllers\BaseController;

class ReportController extends BaseController
{
    public function __construct()
    {
        $this->service = new ReportService();
        parent::__construct();
    }

    public function reportSalesViaMonth(int $month): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->service->reportSalesViaMonth($month));
    }

    public function reportSalesDaily(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->service->reportSalesDaily($request));
    }
}