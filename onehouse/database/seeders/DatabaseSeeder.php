<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userData = [
            ['name' => 'Test User', 'email' => 'test@example.com', 'password' => bcrypt('password')],
            ['name' => 'yuzuha', 'email' => 'yuzuha@example.com', 'password' => bcrypt('pass123')],
        ];

        foreach ($userData as $data) {
            $user = User::create($data);

            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }
    }
}
