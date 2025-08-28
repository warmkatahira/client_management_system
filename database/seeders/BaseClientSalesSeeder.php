<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\BaseClientSale;

class BaseClientSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseClientSale::create([
            'base_client_id'    => 1,
            'year_month'        => '2025-07',
            'amount'            => 100000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 1,
            'year_month'        => '2025-08',
            'amount'            => 200000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 2,
            'year_month'        => '2025-07',
            'amount'            => 3333333,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 2,
            'year_month'        => '2025-08',
            'amount'            => 5555555,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 3,
            'year_month'        => '2025-08',
            'amount'            => 300,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 3,
            'year_month'        => '2025-07',
            'amount'            => 200,
        ]);
    }
}
