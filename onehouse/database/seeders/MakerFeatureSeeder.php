<?php

namespace Database\Seeders;

use App\Models\MakerFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakerFeatureSeeder extends Seeder
{

    public function run(): void
    {
        $makerfeatures = [
            [
                'maker_id' => 1,
                'feature_id' => 4,
            ],
            [
                'maker_id' => 1,
                'feature_id' => 5,
            ],
            [
                'maker_id' => 1,
                'feature_id' => 10,
            ],
            [
                'maker_id' => 1,
                'feature_id' => 14,
            ],
            [
                'maker_id' => 1,
                'feature_id' => 17,
            ],
            [
                'maker_id' => 1,
                'feature_id' => 20,
            ],
        ];

        foreach($makerfeatures as $mf) {
            MakerFeature::create($mf);
        }
    }
}
