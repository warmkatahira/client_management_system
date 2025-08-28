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
            'prefecture_id'             => 13,
            'client_url'                => 'https://www.zoff.com/',
            'client_image_file_name'    => 'zoff.jpg',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00002',
            'client_name'               => 'コンフェックス',
            'prefecture_id'             => 13,
            'client_url'                => 'https://www.confex.co.jp/',
            'client_image_file_name'    => 'confex.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 2,
        ]);
        Client::create([
            'client_code'               => 'C-00003',
            'client_name'               => 'フロムアイズ',
            'prefecture_id'             => 13,
            'client_url'                => 'https://refrear.jp',
            'client_image_file_name'    => 'fromeyes.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 3,
        ]);
        Client::create([
            'client_code'               => 'C-00004',
            'client_name'               => 'PIA',
            'prefecture_id'             => 13,
            'client_url'                => 'https://www.pia-corp.co.jp/index.html',
            'client_image_file_name'    => 'pia.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 4,
        ]);
        Client::create([
            'client_code'               => 'C-00005',
            'client_name'               => 'インタービア',
            'prefecture_id'             => 13,
            'client_url'                => 'https://intervia.co.jp/',
            'client_image_file_name'    => 'intervia.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 5,
        ]);
        Client::create([
            'client_code'               => 'C-00006',
            'client_name'               => 'バナナスピリッツ',
            'prefecture_id'             => 13,
            'client_url'                => 'https://banana-spirits.com/',
            'client_image_file_name'    => 'banana.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 6,
        ]);
        Client::create([
            'client_code'               => 'C-00007',
            'client_name'               => 'Fun Standard',
            'prefecture_id'             => 40,
            'client_url'                => 'https://www.funstandard.jp/',
            'client_image_file_name'    => 'funstandard.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 7,
        ]);
        Client::create([
            'client_code'               => 'C-00008',
            'client_name'               => 'ホダカ',
            'prefecture_id'             => 11,
            'client_url'                => 'https://www.hodaka-bicycles.jp/',
            'client_image_file_name'    => 'hodaka.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 8,
        ]);
    }
}
