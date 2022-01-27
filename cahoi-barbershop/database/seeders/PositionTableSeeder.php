<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = new Position();
        $position->name = 'Cashier';
        $position->save();

        $position = new Position();
        $position->name = 'Intern';
        $position->save();

        $position = new Position();
        $position->name = 'Management';
        $position->save();

        $position = new Position();
        $position->name = 'Style';
        $position->save();
    }
}
