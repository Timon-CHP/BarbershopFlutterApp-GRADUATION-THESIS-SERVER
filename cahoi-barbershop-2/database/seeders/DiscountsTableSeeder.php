<?php

namespace Database\Seeders;

use App\Models\Discount;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Discount::create([
                             "code"        => "DISCOUNT_RANK_SLIVER",
                             "name"        => "Voucher rank Sliver",
                             "description" => "Triết khấu 10% cho hóa đơn của khách hàng rank bạc",
                             "reduction"   => 0.1,
                         ]);

        Discount::create([
                             "code"        => "DISCOUNT_RANK_GOLD",
                             "name"        => "Voucher rank Gold",
                             "description" => "Triết khấu 15% cho hóa đơn của khách hàng rank bạc",
                             "reduction"   => 0.15,
                         ]);
        $fake = Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            Discount::create([
                                 "code"        => "TOP_POST_" . $i,
                                 "name"        => "Voucher Top bài $i chia sẻ",
                                 "description" => "Mã giảm giá dành cho ngưới sở hữu bài chia sẻ có lượt like lớn thứ " . $i . " trong tháng trước",
                                 "reduction"   => round((50 - ($i - 1) * 5) / 100, 2),
                             ]);
        }
    }
}
