<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Client;
use App\Models\BaseClient;
use App\Models\BaseClientItemSubCategory;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'client_code'               => 1403,
            'client_name'               => 'Zoff',
            'representative_name'       => '上野 博史',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 1,
            'base_id'   => '1st',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 1,
            'item_sub_category_id'       => 1,
        ]);
        Client::create([
            'client_code'               => 905,
            'client_name'               => 'コンフェックス',
            'representative_name'       => '昆 靖',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 2,
            'base_id'   => '2nd',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 2,
            'item_sub_category_id'       => 2,
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 2,
            'item_sub_category_id'       => 3,
        ]);
        Client::create([
            'client_code'               => 2703,
            'client_name'               => 'フロムアイズ',
            'representative_name'       => '杉浦 武司',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 3,
            'base_id'   => 'lc',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 3,
            'item_sub_category_id'       => 1,
        ]);
        Client::create([
            'client_code'               => 2601,
            'client_name'               => 'PIA',
            'representative_name'       => '見原 博道',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 4,
            'base_id'   => 'lp',
        ]);
        BaseClient::create([
            'client_id' => 4,
            'base_id'   => 'lc',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 4,
            'item_sub_category_id'       => 1,
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 5,
            'item_sub_category_id'       => 1,
        ]);
        Client::create([
            'client_code'               => 101,
            'client_name'               => 'インタービア',
            'representative_name'       => '河西 優',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 5,
            'base_id'   => 'lsp',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 6,
            'item_sub_category_id'       => 1,
        ]);
        Client::create([
            'client_code'               => 2502,
            'client_name'               => 'バナナスピリッツ',
            'representative_name'       => '米山 博',
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
            'collection_term_id'        => 1,
        ]);
        BaseClient::create([
            'client_id' => 6,
            'base_id'   => 'ls',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 7,
            'item_sub_category_id'       => 5,
        ]);
        Client::create([
            'client_code'               => 2719,
            'client_name'               => 'Fun Standard',
            'representative_name'       => '大屋 良介',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 7,
            'base_id'   => 'lp',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 8,
            'item_sub_category_id'       => 6,
        ]);
        Client::create([
            'client_code'               => 2901,
            'client_name'               => 'ホダカ',
            'representative_name'       => '堀田 宗男',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 8,
            'base_id'   => '3rd',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 9,
            'item_sub_category_id'       => 7,
        ]);
        Client::create([
            'client_code'               => 4001,
            'client_name'               => 'ルラシオン',
            'representative_name'       => '杉本 崇',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 9,
            'base_id'   => 'ls',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 10,
            'item_sub_category_id'       => 4,
        ]);
        Client::create([
            'client_code'               => 2706,
            'client_name'               => 'ブルーイング',
            'representative_name'       => '村上 克也',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 10,
            'base_id'   => 'lsp',
        ]);
        BaseClient::create([
            'client_id' => 10,
            'base_id'   => 'lc',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 11,
            'item_sub_category_id'       => 1,
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 12,
            'item_sub_category_id'       => 1,
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 12,
            'item_sub_category_id'       => 4,
        ]);
        Client::create([
            'client_code'               => 204,
            'client_name'               => 'WELF',
            'representative_name'       => '大谷 圭一郎',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 11,
            'base_id'   => 'lsp',
        ]);
        BaseClient::create([
            'client_id' => 11,
            'base_id'   => 'hiroshima',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 13,
            'item_sub_category_id'       => 4,
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 14,
            'item_sub_category_id'       => 4,
        ]);
        Client::create([
            'client_code'               => 201,
            'client_name'               => 'ウエニ貿易',
            'representative_name'       => '宮上 光喜',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 12,
            'base_id'   => 'lp',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 15,
            'item_sub_category_id'       => 1,
        ]);
        Client::create([
            'client_code'               => 1702,
            'client_name'               => 'ツインクル',
            'representative_name'       => '山本 謙司',
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
            'collection_term_id'        => 2,
        ]);
        BaseClient::create([
            'client_id' => 13,
            'base_id'   => 'lp',
        ]);
        BaseClientItemSubCategory::create([
            'base_client_id'             => 16,
            'item_sub_category_id'       => 5,
        ]);
    }
}