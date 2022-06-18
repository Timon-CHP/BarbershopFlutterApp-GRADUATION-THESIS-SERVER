<?php

namespace Database\Seeders;

use App\Models\Rank;
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
            "rank_name" => "Silver",
            "threshold" => "0"
        ]);
        Rank::create([
            "rank_name" => "Gold",
            "threshold" => "1500"
        ]);
    }
}
