<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ClientItemSubCategory;

class ClientItemSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientItemSubCategory::create([
            'client_item_category_id'       => 1,
            'client_item_sub_category_name' => 'コンタクトレンズ',
            'sort_order'                    => 1,
        ]);
        ClientItemSubCategory::create([
            'client_item_category_id'       => 2,
            'client_item_sub_category_name' => 'お菓子',
            'sort_order'                    => 2,
        ]);
        ClientItemSubCategory::create([
            'client_item_category_id'       => 2,
            'client_item_sub_category_name' => '飲料',
            'sort_order'                    => 3,
        ]);
        ClientItemSubCategory::create([
            'client_item_category_id'       => 3,
            'client_item_sub_category_name' => '化粧品',
            'sort_order'                    => 4,
        ]);
        ClientItemSubCategory::create([
            'client_item_category_id'       => 4,
            'client_item_sub_category_name' => 'キャラクターグッズ',
            'sort_order'                    => 5,
        ]);
        ClientItemSubCategory::create([
            'client_item_category_id'       => 5,
            'client_item_sub_category_name' => '雑貨',
            'sort_order'                    => 6,
        ]);
        ClientItemSubCategory::create([
            'client_item_category_id'       => 6,
            'client_item_sub_category_name' => '自転車',
            'sort_order'                    => 7,
        ]);
    }
}
