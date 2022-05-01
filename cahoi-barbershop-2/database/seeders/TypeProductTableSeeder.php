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
        $categoryService = new TypeProduct();
        $categoryService->name = 'Hair cut/styling';
        $categoryService->save();

        $categoryService = new TypeProduct();
        $categoryService->name = 'Hair dying';
        $categoryService->save();

        $categoryService = new TypeProduct();
        $categoryService->name = 'Curling hair';
        $categoryService->save();

        $categoryService = new TypeProduct();
        $categoryService->name = 'More';
        $categoryService->save();
    }
}
