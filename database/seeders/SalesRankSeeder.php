<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\SalesRank;

class SalesRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalesRank::create([
            'sales_rank_name'   => 'S',
            'min_amount'        => 20000000,
            'max_amount'        => null,
            'sort_order'        => 1,
        ]);
        SalesRank::create([
            'sales_rank_name'   => 'A',
            'min_amount'        => 10000000,
            'max_amount'        => 19999999,
            'sort_order'        => 2,
        ]);
        SalesRank::create([
            'sales_rank_name'   => 'B',
            'min_amount'        => 5000000,
            'max_amount'        => 9999999,
            'sort_order'        => 3,
        ]);
        SalesRank::create([
            'sales_rank_name'   => 'C',
            'min_amount'        => 1000000,
            'max_amount'        => 4999999,
            'sort_order'        => 4,
        ]);
        SalesRank::create([
            'sales_rank_name'   => 'D',
            'min_amount'        => 0,
            'max_amount'        => 999999,
            'sort_order'        => 5,
        ]);
    }
}
