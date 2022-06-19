<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Revenue;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Seeder;

class RevenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $countFacility = Facility::query()->get()->count();

        $data          = [];
        for ($i = 1; $i <= $countFacility; $i++) {
            $data[] = [
                'total_revenue_month' => random_int(10000, 100000),
                'closing_at'         => Carbon::now()->subMonth(),
                'facility_id'         => $i,
                "created_at"          => Carbon::now(),
                "updated_at"          => Carbon::now()
            ];
        }

        Revenue::query()->insert($data);
    }
}
