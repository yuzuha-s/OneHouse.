<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $categories = [
            [
                'name' => "ブランド力",
            ],
            [
                'name' => "工法・構造",
            ],
            [
                'name' => "耐熱性能・省エネ性",
            ],
            [
                'name' => "耐震性",
            ],
            [
                'name' => "保証・アフターサービス",
            ],
            [
                'name' => "デザイン間取りの自由度",
            ],
        ];

        foreach($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}
