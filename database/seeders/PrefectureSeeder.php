<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Prefecture;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 地域ごとの都道府県マップ
        $regions = [
            1 => ['北海道'],
            2 => ['青森県','岩手県','宮城県','秋田県','山形県','福島県'],                                     // 東北
            3 => ['茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県'],                           // 関東
            4 => ['新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県'],   // 中部
            5 => ['滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県'],                                   // 近畿
            6 => ['鳥取県','島根県','岡山県','広島県','山口県'],                                              // 中国
            7 => ['徳島県','香川県','愛媛県','高知県'],                                                      // 四国
            8 => ['福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'],                   // 九州
        ];
        // 地域の分だけループ処理
        foreach($regions as $region_id => $prefectures){
            // 都道府県の分だけループ処理
            foreach($prefectures as $prefecture){
                // 追加
                Prefecture::create([
                    'region_id'       => $region_id,
                    'prefecture_name' => $prefecture,
                ]);
            }
        }
    }
}
