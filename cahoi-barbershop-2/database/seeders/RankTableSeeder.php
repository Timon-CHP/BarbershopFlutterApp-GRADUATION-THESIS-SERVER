<?php

namespace Database\Seeders;

use App\Models\Rank;
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
        Rank::create([
            "rank_name" => "None",
            "threshold" => "0"
        ]);
        Rank::create([
            "rank_name" => "Silver",
            "threshold" => "10"
        ]);
        Rank::create([
            "rank_name" => "Gold",
            "threshold" => "30"
        ]);
        Rank::create([
            "rank_name" => "Diamond",
            "threshold" => "100"
        ]);
    }
}
