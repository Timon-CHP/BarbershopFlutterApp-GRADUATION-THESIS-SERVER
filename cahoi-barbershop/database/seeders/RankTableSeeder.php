<?php

namespace Database\Seeders;

use App\Models\RankMember;
use Illuminate\Database\Seeder;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rankMember = new RankMember();
        $rankMember->name = 'None';
        $rankMember->save();

        $rankMember = new RankMember();
        $rankMember->name = 'Silver';
        $rankMember->save();

        $rankMember = new RankMember();
        $rankMember->name = 'Gold';
        $rankMember->save();

        $rankMember = new RankMember();
        $rankMember->name = 'Diamond';
        $rankMember->save();
    }
}
