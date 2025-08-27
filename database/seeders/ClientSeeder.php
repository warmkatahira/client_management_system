<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'client_code'               => 'C-00001',
            'client_name'               => 'Zoff',
            'client_url'                => 'https://www.zoff.com/',
            'client_image_file_name'    => 'zoff.jpg',
            'base_id'                   => '1st',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00002',
            'client_name'               => 'コンフェックス',
            'client_url'                => 'https://www.confex.co.jp/',
            'client_image_file_name'    => 'confex.png',
            'base_id'                   => '2nd',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 2,
        ]);
    }
}
