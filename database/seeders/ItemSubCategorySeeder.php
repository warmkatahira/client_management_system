<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ItemSubCategory;

class ItemSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemSubCategory::create([
            'item_category_id'       => 1,
            'item_sub_category_name' => 'コンタクトレンズ',
            'sort_order'                    => 1,
        ]);
        ItemSubCategory::create([
            'item_category_id'       => 2,
            'item_sub_category_name' => 'お菓子',
            'sort_order'                    => 2,
        ]);
        ItemSubCategory::create([
            'item_category_id'       => 2,
            'item_sub_category_name' => '飲料',
            'sort_order'                    => 3,
        ]);
        ItemSubCategory::create([
            'item_category_id'       => 3,
            'item_sub_category_name' => '化粧品',
            'sort_order'                    => 4,
        ]);
        ItemSubCategory::create([
            'item_category_id'       => 4,
            'item_sub_category_name' => 'キャラクターグッズ',
            'sort_order'                    => 5,
        ]);
        ItemSubCategory::create([
            'item_category_id'       => 5,
            'item_sub_category_name' => '雑貨',
            'sort_order'                    => 6,
        ]);
        ItemSubCategory::create([
            'item_category_id'       => 6,
            'item_sub_category_name' => '自転車',
            'sort_order'                    => 7,
        ]);
    }
}
