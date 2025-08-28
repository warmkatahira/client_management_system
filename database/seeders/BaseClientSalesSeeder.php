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
            'amount'            => 3000000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 1,
            'year_month'        => '2025-08',
            'amount'            => 3200000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 2,
            'year_month'        => '2025-07',
            'amount'            => 4000000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 2,
            'year_month'        => '2025-08',
            'amount'            => 3900000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 3,
            'year_month'        => '2025-08',
            'amount'            => 5430000,
        ]);
        BaseClientSale::create([
            'base_client_id'    => 3,
            'year_month'        => '2025-07',
            'amount'            => 6000000,
        ]);
    }
}
