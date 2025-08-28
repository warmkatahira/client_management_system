<?php

namespace App\Services\ClientManagement\ClientSalesList;

// モデル
use App\Models\Client;
// その他
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ClientSalesListDownloadService
{
    // ダウンロードするデータを取得
    public function getDownloadData($clients)
    {
        // チャンクサイズを指定
        $chunk_size = 1000;
        $response = new StreamedResponse(function () use ($clients, $chunk_size){
            // ハンドルを取得
            $handle = fopen('php://output', 'wb');
            // BOMを書き込む
            fwrite($handle, "\xEF\xBB\xBF");
            // システムに定義してあるヘッダーを取得し、書き込む
            $header = Client::downloadHeaderAtClientSalesList();
            fputcsv($handle, $header);
            // レコードをチャンクごとに書き込む
            $clients->chunk($chunk_size, function ($clients) use ($handle){
                // 顧客の分だけループ処理
                foreach($clients as $client){
                    // 変数に情報を格納
                    $row = [
                        $client->is_active_text,
                        formatYearMonth($client->year_month),
                        $client->base_name,
                        $client->client_code,
                        $client->full_client_name,
                        $client->amount,
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