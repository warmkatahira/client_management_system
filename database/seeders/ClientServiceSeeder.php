<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ClientService;

class ClientServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientService::create([
            'client_service_name'       => '保管',
            'sort_order'                => 1,
        ]);
        ClientService::create([
            'client_service_name'       => '入出庫',
            'sort_order'                => 2,
        ]);
        ClientService::create([
            'client_service_name'       => '荷役',
            'sort_order'                => 3,
        ]);
        ClientService::create([
            'client_service_name'       => 'システム',
            'sort_order'                => 4,
        ]);
        ClientService::create([
            'client_service_name'       => '地代家賃',
            'sort_order'                => 5,
        ]);
    }
}
