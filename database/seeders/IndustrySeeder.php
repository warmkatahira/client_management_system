<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Industry;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Industry::create([
            'industry_name'     => '製造業',
            'sort_order'        => 1,
        ]);
        Industry::create([
            'industry_name'     => '卸売業・小売業',
            'sort_order'        => 2,
        ]);
        Industry::create([
            'industry_name'     => '運輸業・物流業',
            'sort_order'        => 3,
        ]);
    }
}
