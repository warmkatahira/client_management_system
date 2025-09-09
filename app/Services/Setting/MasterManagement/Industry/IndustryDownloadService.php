<?php

namespace App\Services\Setting\MasterManagement\Industry;

// モデル
use App\Models\Industry;
// その他
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class IndustryDownloadService
{
    // ダウンロードするデータを取得
    public function getDownloadData($industries)
    {
        // チャンクサイズを指定
        $chunk_size = 1000;
        $response = new StreamedResponse(function () use ($industries, $chunk_size){
            // ハンドルを取得
            $handle = fopen('php://output', 'wb');
            // BOMを書き込む
            fwrite($handle, "\xEF\xBB\xBF");
            // システムに定義してあるヘッダーを取得し、書き込む
            $header = Industry::downloadHeaderAtIndustry();
            fputcsv($handle, $header);
            // レコードをチャンクごとに書き込む
            $industries->chunk($chunk_size, function ($industries) use ($handle){
                // 業種の分だけループ処理
                foreach($industries as $industry){
                    // 変数に情報を格納
                    $row = [
                        $industry->industry_name,
                        $industry->sort_order,
                        CarbonImmutable::parse($industry->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss'),
                    ];
                    // 書き込む
                    fputcsv($handle, $row);
                };
            });
            // ファイルを閉じる
            fclose($handle);
        });
        return $response;
    }
}