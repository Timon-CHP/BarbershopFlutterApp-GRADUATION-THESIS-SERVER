<?php

namespace Database\Seeders;

use App\Models\CategoryService;
use Illuminate\Database\Seeder;

class CategoryServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryService = new CategoryService();
        $categoryService->name = 'Hair cut/styling';
        $categoryService->save();

        $categoryService = new CategoryService();
        $categoryService->name = 'Hair dying';
        $categoryService->save();

        $categoryService = new CategoryService();
        $categoryService->name = 'Curling hair';
        $categoryService->save();

        $categoryService = new CategoryService();
        $categoryService->name = 'More';
        $categoryService->save();
    }
}
