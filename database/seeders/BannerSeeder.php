<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Banner::create([
                'image' => 'default.jpg',
            ]);
        }
    }
}
