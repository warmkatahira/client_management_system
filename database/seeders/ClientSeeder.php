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
        Client::create([
            'client_code'               => 'C-00003',
            'client_name'               => 'フロムアイズ',
            'client_url'                => 'https://refrear.jp',
            'client_image_file_name'    => 'fromeyes.png',
            'base_id'                   => 'lc',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 3,
        ]);
        Client::create([
            'client_code'               => 'C-00004',
            'client_name'               => 'PIA',
            'client_url'                => 'https://www.pia-corp.co.jp/index.html',
            'client_image_file_name'    => 'pia.png',
            'base_id'                   => 'lp',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 4,
        ]);
        Client::create([
            'client_code'               => 'C-00005',
            'client_name'               => 'インタービア',
            'client_url'                => 'https://intervia.co.jp/',
            'client_image_file_name'    => 'intervia.png',
            'base_id'                   => 'lsp',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 5,
        ]);
        Client::create([
            'client_code'               => 'C-00006',
            'client_name'               => 'バナナスピリッツ',
            'client_url'                => 'https://banana-spirits.com/',
            'client_image_file_name'    => 'banana.png',
            'base_id'                   => 'ls',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 6,
        ]);
    }
}
