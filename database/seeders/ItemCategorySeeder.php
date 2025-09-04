<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ItemCategory;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemCategory::create([
            'item_category_name'         => 'コンタクトレンズ',
            'sort_order'                        => 1,
        ]);
        ItemCategory::create([
            'item_category_name'         => '食品',
            'sort_order'                        => 2,
        ]);
        ItemCategory::create([
            'item_category_name'         => '化粧品',
            'sort_order'                        => 3,
        ]);
        ItemCategory::create([
            'item_category_name'         => 'キャラクターグッズ',
            'sort_order'                        => 4,
        ]);
        ItemCategory::create([
            'item_category_name'         => '雑貨',
            'sort_order'                        => 5,
        ]);
        ItemCategory::create([
            'item_category_name'         => '自転車',
            'sort_order'                        => 6,
        ]);
    }
}
