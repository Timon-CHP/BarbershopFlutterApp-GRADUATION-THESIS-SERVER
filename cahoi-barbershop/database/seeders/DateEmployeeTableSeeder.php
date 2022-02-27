<?php

namespace Database\Seeders;

use App\Models\DateEmployee;
use Illuminate\Database\Seeder;

class DateEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 50; $i++){
            $dateEmployee = new DateEmployee;
            $dateEmployee->date_id = random_int(1, 3);
            $dateEmployee->employee_id = $i;
            $dateEmployee->save();
        }
    }
}
