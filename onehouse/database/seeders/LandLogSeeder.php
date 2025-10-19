<?php

namespace Database\Seeders;

use App\Models\LandLog;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandLogSeeder extends Seeder
{
    public function run(): void
    {
        $profile = Profile::first() ?? Profile::create([
            'user_id' => 1,
        ]);

        $landLogs = [
            [
                'profile_id' => $profile->id,
                'address' => "東京都板橋区3丁目1-55",
                'landarea' => 80.0,
                'far' => 200,
                'bcr' => 80,
                'floor_id' => 2,
                'builable_area' => 0,
                'pricePerTsubo' => 87,
            ],
            [
                'profile_id' => $profile->id,
                'address' => "東京都板橋区5丁目2-66",
                'landarea' => 90.0,
                'far' => 150,
                'bcr' => 60,
                'floor_id' => 3,
                'builable_area' => 0,
                'pricePerTsubo' => 77,
            ],

        ];

        foreach ($landLogs as $landLog) {
            LandLog::firstOrCreate($landLog);
        }
    }
}
