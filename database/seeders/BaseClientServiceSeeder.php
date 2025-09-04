<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\BaseClientService;

class BaseClientServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 16; $i++){
            for($k = 1; $k <= 4; $k++){
                BaseClientService::create([
                    'base_client_id'    => $i,
                    'service_id'        => $k,
                ]);
            }
        }
    }
}
