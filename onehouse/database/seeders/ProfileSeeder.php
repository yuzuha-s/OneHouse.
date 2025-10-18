<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::all() as $user) {
            Profile::create([
                'user_id' => $user->id,
            ]);
        }
    }
}
