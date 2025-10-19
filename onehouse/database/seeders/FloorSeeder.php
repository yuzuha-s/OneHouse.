<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    public function run(): void
    {
        $floors = [
            [
                'floor' => 1,
            ],
            [
                'floor' => 2,
            ],
            [
                'floor' => 3,
            ],
        ];

        foreach ($floors as $floor) {
            Floor::firstOrCreate($floor);
        }
    }
}
