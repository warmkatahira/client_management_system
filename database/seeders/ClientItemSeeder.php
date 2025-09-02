<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ClientItem;

class ClientItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientItem::create([
            'client_item_name'          => 'コンタクトレンズ',
            'sort_order'                => 1,
        ]);
        ClientItem::create([
            'client_item_name'          => '食品',
            'sort_order'                => 2,
        ]);
        ClientItem::create([
            'client_item_name'          => '化粧品',
            'sort_order'                => 3,
        ]);
        ClientItem::create([
            'client_item_name'          => 'キャラクターグッズ',
            'sort_order'                => 4,
        ]);
        ClientItem::create([
            'client_item_name'          => '雑貨',
            'sort_order'                => 5,
        ]);
        ClientItem::create([
            'client_item_name'          => '自転車',
            'sort_order'                => 6,
        ]);
    }
}
