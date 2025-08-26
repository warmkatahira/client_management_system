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
            'client_name'               => '株式会社Zoff',
            'client_url'                => 'https://www.zoff.com/',
            'client_image_file_name'    => 'zoff.jpg',
            'base_id'                   => '1st',
            'industry_id'               => 2,
            'sort_order'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00002',
            'client_name'               => 'コンフェックス株式会社',
            'client_url'                => 'https://www.confex.co.jp/',
            'client_image_file_name'    => 'confex.png',
            'base_id'                   => '2nd',
            'industry_id'               => 2,
            'sort_order'                => 2,
        ]);
    }
}
