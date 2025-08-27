<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\BaseClient;

class BaseClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseClient::create([
            'client_id' => 1,
            'base_id'   => '1st',
        ]);
        BaseClient::create([
            'client_id' => 2,
            'base_id'   => '2nd',
        ]);
        BaseClient::create([
            'client_id' => 3,
            'base_id'   => 'lc',
        ]);
        BaseClient::create([
            'client_id' => 4,
            'base_id'   => 'lp',
        ]);
        BaseClient::create([
            'client_id' => 4,
            'base_id'   => 'lc',
        ]);
        BaseClient::create([
            'client_id' => 5,
            'base_id'   => 'lsp',
        ]);
        BaseClient::create([
            'client_id' => 6,
            'base_id'   => 'ls',
        ]);
    }
}
