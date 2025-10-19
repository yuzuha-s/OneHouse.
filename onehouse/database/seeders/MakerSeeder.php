<?php

namespace Database\Seeders;

use App\Models\Maker;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakerSeeder extends Seeder
{

    public function run(): void
    {
        $profile = Profile::first() ?? Profile::create([
            'user_id' => 1,
        ]);

        $makers = [
            [
                'profile_id' => $profile->id,
                'name' => "ミサワホーム",
                'sales' => "田中",
                'option' => "友達紹介で３０万円割引特典あり",
                'star' => 2,
            ],
            [
                'profile_id' => $profile->id,
                'name' => "スター工務店",
                'sales' => "立花",
                'option' => "割引なし",
                'star' => 1,
            ],
        ];

        foreach ($makers as $maker) {
            Maker::firstOrCreate($maker);
        }
    }
}
