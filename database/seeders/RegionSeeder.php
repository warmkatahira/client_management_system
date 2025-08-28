<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create([
            'region_name' => '北海道',
        ]);
        Region::create([
            'region_name' => '東北',
        ]);
        Region::create([
            'region_name' => '関東',
        ]);
        Region::create([
            'region_name' => '中部',
        ]);
        Region::create([
            'region_name' => '近畿',
        ]);
        Region::create([
            'region_name' => '中国',
        ]);
        Region::create([
            'region_name' => '四国',
        ]);
        Region::create([
            'region_name' => '九州',
        ]);
    }
}
