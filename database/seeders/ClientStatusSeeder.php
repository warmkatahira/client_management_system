<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\ClientStatus;

class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientStatus::create([
            'client_status'     => '取引前',
            'sort_order'        => 1,
        ]);
        ClientStatus::create([
            'client_status'     => '取引中',
            'sort_order'        => 2,
        ]);
        ClientStatus::create([
            'client_status'     => '撤退',
            'sort_order'        => 3,
        ]);
    }
}
