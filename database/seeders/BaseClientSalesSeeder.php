<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\BaseClient;
use App\Models\BaseClientSale;
// その他
use Carbon\CarbonImmutable;

class BaseClientSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $base_clients = BaseClient::pluck('base_client_id');
        // Carbonを使って開始月と終了月を設定
        $start = CarbonImmutable::create(2025, 1, 1);
        $end   = CarbonImmutable::create(2025, 9, 1);
        // 月ごとにループ
        for($date = $start; $date->lte($end); $date = $date->addMonth()){
            foreach($base_clients as $base_client_id){
                BaseClientSale::create([
                    'base_client_id' => $base_client_id,
                    'year_month'     => $date->format('Y-m'),
                    'amount'         => rand(100000, 10000000),
                ]);
            }
        }
    }
}
