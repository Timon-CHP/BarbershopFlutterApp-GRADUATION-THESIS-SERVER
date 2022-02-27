<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $employee = new Employee();
            $employee->name = $fake->name;
            $employee->birthday = $fake->date;
            $employee->skill_rate = random_int(35,50)/10;
            $employee->communication_rate = random_int(35,50)/10;
            $employee->is_working = true;
            $employee->position_id = 4;
            $employee->workplace_id = random_int(1,5);
            $employee->save();
        }
    }
}
