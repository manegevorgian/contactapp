<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->truncate();
        $news = [];
        $faker = Faker::create('hy_AM');
        foreach (range(1, 10) as $index) {
            $news[] = [
                'title' => $faker->sentence,
                'short_content' => $faker->text(50),
                'content' => $faker->paragraph,
                'author_name' => $faker->name,
                'preview' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('news')->insert($news);
    }
}
