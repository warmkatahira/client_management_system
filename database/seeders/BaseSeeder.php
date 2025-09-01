<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Base;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Base::create([
            'base_id'           => 'honsha',
            'base_name'         => '本社',
            'short_base_name'   => '本社',
            'base_color_code'   => '#e5fff4',
            'sort_order'        => 1,
        ]);
        Base::create([
            'base_id'           => '1st',
            'base_name'         => '第1営業所',
            'short_base_name'   => '第1',
            'base_color_code'   => '#e6e6fa',
            'sort_order'        => 2,
        ]);
        Base::create([
            'base_id'           => '2nd',
            'base_name'         => '第2営業所',
            'short_base_name'   => '第2',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 3,
        ]);
        Base::create([
            'base_id'           => '3rd',
            'base_name'         => '第3営業所',
            'short_base_name'   => '第3',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 4,
        ]);
        Base::create([
            'base_id'           => 'ls',
            'base_name'         => 'ロジステーション',
            'short_base_name'   => 'ロジS',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 5,
        ]);
        Base::create([
            'base_id'           => 'lp',
            'base_name'         => 'ロジポート',
            'short_base_name'   => 'ロジP',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 6,
        ]);
        Base::create([
            'base_id'           => 'hiroshima',
            'base_name'         => '広島営業所',
            'short_base_name'   => '広島',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 7,
        ]);
        Base::create([
            'base_id'           => 'lc',
            'base_name'         => 'ロジコンタクト',
            'short_base_name'   => 'ロジC',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 8,
        ]);
        Base::create([
            'base_id'           => 'lsp',
            'base_name'         => 'ロジステーションプラス',
            'short_base_name'   => 'ロジS+',
            'base_color_code'   => '#faf0e6',
            'sort_order'        => 9,
        ]);
    }
}
