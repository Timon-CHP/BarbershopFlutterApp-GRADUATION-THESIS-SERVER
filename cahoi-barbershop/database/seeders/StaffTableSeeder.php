<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
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
            $staff = new Employee();
            $staff->name = $fake->name;
            $staff->birthday = $fake->date;
            $staff->skill_rate = random_int(35,50)/10;
            $staff->communication_rate = random_int(35,50)/10;
            $staff->is_working = true;
            $staff->work_schedule = 'aaaaa';
            $staff->position_id = 4;
            $staff->workplace_id = random_int(1,5);
            $staff->save();
        }
    }
}
