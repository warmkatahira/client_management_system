<?php

namespace App\Services\Setting\MasterManagement\Service;

// モデル
use App\Models\Service;
// その他
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ServiceDownloadService
{
    // ダウンロードするデータを取得
    public function getDownloadData($services)
    {
        // チャンクサイズを指定
        $chunk_size = 1000;
        $response = new StreamedResponse(function () use ($services, $chunk_size){
            // ハンドルを取得
            $handle = fopen('php://output', 'wb');
            // BOMを書き込む
            fwrite($handle, "\xEF\xBB\xBF");
            // システムに定義してあるヘッダーを取得し、書き込む
            $header = Service::downloadHeaderAtService();
            fputcsv($handle, $header);
            // レコードをチャンクごとに書き込む
            $services->chunk($chunk_size, function ($services) use ($handle){
                // 提供内容の分だけループ処理
                foreach($services as $service){
                    // 変数に情報を格納
                    $row = [
                        $service->service_name,
                        $service->sort_order,
                        CarbonImmutable::parse($service->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss'),
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