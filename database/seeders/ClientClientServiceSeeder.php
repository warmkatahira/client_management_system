<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ClientClientService;

class ClientClientServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 13; $i++){
            for($k = 1; $k <= 4; $k++){
                ClientClientService::create([
                    'client_id'         => $i,
                    'client_service_id' => $k,
                ]);
            }
        }
    }
}
