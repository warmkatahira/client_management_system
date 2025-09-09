<?php

namespace App\Services\Setting\MasterManagement\ItemCategory;

// モデル
use App\Models\ItemCategory;
// その他
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ItemCategoryDownloadService
{
    // ダウンロードするデータを取得
    public function getDownloadData($item_categories)
    {
        // チャンクサイズを指定
        $chunk_size = 1000;
        $response = new StreamedResponse(function () use ($item_categories, $chunk_size){
            // ハンドルを取得
            $handle = fopen('php://output', 'wb');
            // BOMを書き込む
            fwrite($handle, "\xEF\xBB\xBF");
            // システムに定義してあるヘッダーを取得し、書き込む
            $header = ItemCategory::downloadHeaderAtItemCategory();
            fputcsv($handle, $header);
            // レコードをチャンクごとに書き込む
            $item_categories->chunk($chunk_size, function ($item_categories) use ($handle){
                // 取扱品目(大)の分だけループ処理
                foreach($item_categories as $item_category){
                    // 取扱品目(小)の分だけループ処理
                    foreach($item_category->item_sub_categories as $item_sub_category){
                        // 変数に情報を格納
                        $row = [
                            $item_category->item_category_name,
                            $item_sub_category->item_sub_category_name,
                            $item_sub_category->sort_order,
                            $item_category->user->full_name,
                            CarbonImmutable::parse($item_sub_category->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss'),
                        ];
                        // 書き込む
                        fputcsv($handle, $row);
                    }
                };
            });
            // ファイルを閉じる
            fclose($handle);
        });
        return $response;
    }
}