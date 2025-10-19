<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Features;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'category_id' => 1,
                'tag' => "信頼性"
            ],
            [
                'category_id' => 1,
                'tag' => "実績"
            ],
            [
                'category_id' => 1,
                'tag' => "品質"
            ],
            [
                'category_id' => 1,
                'tag' => "ブランドイメージ"
            ],
            [
                'category_id' => 2,
                'tag' => "木造"
            ],
            [
                'category_id' => 2,
                'tag' => "鉄骨"
            ],
            [
                'category_id' => 2,
                'tag' => "RC造"
            ],
            [
                'category_id' => 2,
                'tag' => "ハイブリッド工法"
            ],
            [
                'category_id' => 2,
                'tag' => "その他"
            ],
            [
                'category_id' => 3,
                'tag' => "等級6以上"
            ],
            [
                'category_id' => 3,
                'tag' => "等級5"
            ],
            [
                'category_id' => 3,
                'tag' => "等級4"
            ],
            [
                'category_id' => 3,
                'tag' => "等級3以下"
            ],
            [
                'category_id' => 4,
                'tag' => "等級3"
            ],
            [
                'category_id' => 4,
                'tag' => "等級2"
            ],
            [
                'category_id' => 4,
                'tag' => "等級1"
            ],
            [
                'category_id' => 5,
                'tag' => "保証あり"
            ],
            [
                'category_id' => 5,
                'tag' => "アフターサービスあり"
            ],
            [
                'category_id' => 6,
                'tag' => "規格型"
            ],
            [
                'category_id' => 6,
                'tag' => "セミオーダー"
            ],
            [
                'category_id' => 6,
                'tag' => "フルオーダー"
            ],
            [
                'category_id' => 6,
                'tag' => "内装デザイン"
            ],
            [
                'category_id' => 6,
                'tag' => "ステップフロア可"
            ],

        ];
        foreach ($features as $feature) {
            Feature::firstOrCreate($feature);
        }
    }
}
