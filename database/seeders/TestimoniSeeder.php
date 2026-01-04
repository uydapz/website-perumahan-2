<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Testimoni::create([
                'name' => 'James Smith',
                'jabatan' => 'Designer, Co-founder',
                'message' => 'Far far away, behind the word mountains...',
                'rating' => 5,
                'image' => 'james-smith.jpg'
            ]);
        }
    }
}
