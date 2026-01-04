<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Articles::create([
                'title' => 'California, USA',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo ab dolor aliquid rerum ipsam ducimus cum unde doloribus fugiat soluta.',
                'image' => 'california-house.jpg'
            ]);
        }
    }
}
