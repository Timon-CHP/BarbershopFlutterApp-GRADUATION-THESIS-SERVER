<?php

namespace Database\Seeders;

use App\Models\CategoryService;
use App\Models\TypeProduct;
use Illuminate\Database\Seeder;

class TypeProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeProduct::query()->insert([
            [
                'name' => 'Cắt gội massage'
            ],
            [
                'name' => 'Combo chăm sóc da'
            ],
            [
                'name' => 'Uốn hàn quốc'
            ],
            [
                'name' => 'Nhuộm cao cấp'
            ],
        ]);
    }
}
