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
            'client_postal_code'        => '107-0061',
            'prefecture_id'             => 13,
            'client_address'            => '港区北青山3-6-1 オーク表参道6階',
            'client_tel'                => '03-5468-8650',
            'client_url'                => 'https://www.zoff.com/',
            'client_image_file_name'    => 'zoff.jpg',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 1,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00002',
            'client_name'               => 'コンフェックス',
            'client_postal_code'        => '151-8590',
            'prefecture_id'             => 13,
            'client_address'            => '渋谷区代々木3丁目38-7',
            'client_tel'                => null,
            'client_url'                => 'https://www.confex.co.jp/',
            'client_image_file_name'    => 'confex.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 2,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00003',
            'client_name'               => 'フロムアイズ',
            'client_postal_code'        => '101-0054',
            'prefecture_id'             => 13,
            'client_address'            => '千代田区神田錦町2-2-1 KANDA SQUARE 11階',
            'client_tel'                => '03-5209-1223',
            'client_url'                => 'https://refrear.jp',
            'client_image_file_name'    => 'fromeyes.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 3,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00004',
            'client_name'               => 'PIA',
            'client_postal_code'        => '141-0032',
            'prefecture_id'             => 13,
            'client_address'            => '品川区大崎1-2-2',
            'client_tel'                => '03-6417-0220',
            'client_url'                => 'https://www.pia-corp.co.jp/index.html',
            'client_image_file_name'    => 'pia.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 4,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00005',
            'client_name'               => 'インタービア',
            'client_postal_code'        => '108-0023',
            'prefecture_id'             => 13,
            'client_address'            => '港区芝浦4丁目12番31号 VORT芝浦WaterFront3階',
            'client_tel'                => '03-6435-3121',
            'client_url'                => 'https://intervia.co.jp/',
            'client_image_file_name'    => 'intervia.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 5,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00006',
            'client_name'               => 'バナナスピリッツ',
            'client_postal_code'        => '105-0014',
            'prefecture_id'             => 13,
            'client_address'            => '港区芝3丁目15-13YODAビル10F',
            'client_tel'                => '03-6435-3912',
            'client_url'                => 'https://banana-spirits.com/',
            'client_image_file_name'    => 'banana.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 6,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00007',
            'client_name'               => 'Fun Standard',
            'client_postal_code'        => '816-0954',
            'prefecture_id'             => 40,
            'client_address'            => '大野城市紫台16-6 パセオ南ヶ丘1001',
            'client_tel'                => null,
            'client_url'                => 'https://www.funstandard.jp/',
            'client_image_file_name'    => 'funstandard.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 2,
            'sort_order'                => 7,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00008',
            'client_name'               => 'ホダカ',
            'client_postal_code'        => '343-8520',
            'prefecture_id'             => 11,
            'client_address'            => '越谷市流通団地1-1-9',
            'client_tel'                => '048-985-2000',
            'client_url'                => 'https://www.hodaka-bicycles.jp/',
            'client_image_file_name'    => 'hodaka.png',
            'account_type_id'           => 1,
            'company_type_id'           => 2,
            'industry_id'               => 1,
            'sort_order'                => 8,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00009',
            'client_name'               => 'ルラシオン',
            'client_postal_code'        => '062-0035',
            'prefecture_id'             => 1,
            'client_address'            => '札幌市豊平区西岡五条1-16-23',
            'client_tel'                => '011-855-9080',
            'client_url'                => 'https://www.relations-labo.com/',
            'client_image_file_name'    => 'relations.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 9,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00010',
            'client_name'               => 'ブルーイング',
            'client_postal_code'        => '130-0003',
            'prefecture_id'             => 13,
            'client_address'            => '墨田区横川5-10-1-916',
            'client_tel'                => null,
            'client_url'                => 'https://bluing.co.jp/',
            'client_image_file_name'    => 'bluing.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 10,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00011',
            'client_name'               => 'WELF',
            'client_postal_code'        => '107-0062',
            'prefecture_id'             => 13,
            'client_address'            => '港区南青山2-2-15 ウィン青山1042',
            'client_tel'                => null,
            'client_url'                => 'https://welf.co.jp/',
            'client_image_file_name'    => 'welf.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 11,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00012',
            'client_name'               => 'ウエニ貿易',
            'client_postal_code'        => '110-0008',
            'prefecture_id'             => 13,
            'client_address'            => '台東区池之端1-6-17',
            'client_tel'                => '03-5815-5700',
            'client_url'                => 'https://www.ueni.co.jp/',
            'client_image_file_name'    => 'ueni.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 12,
            'updated_by'                => 1,
        ]);
        Client::create([
            'client_code'               => 'C-00013',
            'client_name'               => 'ツインクル',
            'client_postal_code'        => '579-8038',
            'prefecture_id'             => 27,
            'client_address'            => '東大阪市箱殿町11-11',
            'client_tel'                => null,
            'client_url'                => 'https://twincre.com/',
            'client_image_file_name'    => 'twincre.png',
            'account_type_id'           => 1,
            'company_type_id'           => 1,
            'industry_id'               => 2,
            'sort_order'                => 12,
            'updated_by'                => 1,
        ]);
    }
}
