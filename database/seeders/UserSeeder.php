<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 1 admin dulu
        User::create([
            'name' => 'Miqdad',
            'email' => 'miqdad@ppb.com',
            'password' => Hash::make('password'),
        ]);

        // Buat 10 user pengunjung
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User {$i}",
                'email' => "user{$i}@tour.id",
                'password' => Hash::make('password'),
            ]);
        }
    }
}
