<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 200; $i++) {
            $article = new Article();
            $article->title = $faker->name();
            $article->content = $faker->text();
            $article->save();
        }
    }
}
