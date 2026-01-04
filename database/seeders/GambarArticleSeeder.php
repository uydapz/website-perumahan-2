<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Seeder;
use App\Models\GambarArticle;

class GambarArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = Articles::all();

        foreach ($articles as $a) {
            // Tambahkan 3 gambar per a
            for ($i = 1; $i <= 3; $i++) {
                GambarArticle::create([
                    'article_id' => $a->id,
                    'image' => 'dummy/a' . $i . '.jpg', // ganti dengan path yang sesuai di public/storage
                ]);
            }
        }
    }
}
