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
        RankMember::create([
            'rank_member_id'=> '1',
            'name' => 'Silver',
        ]);

        RankMember::create([
            'rank_member_id'=> '2',
            'name' => 'Silver',
        ]);

        RankMember::create([
            'rank_member_id'=> '3',
            'name' => 'Gold'
        ]);

        RankMember::create([
            'rank_member_id'=> '4',
            'name' => 'Diamond'
        ]);
    }
}
