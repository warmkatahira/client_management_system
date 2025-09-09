<?php

namespace App\Services\ClientManagement\ClientList;

// モデル
use App\Models\Client;
// その他
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ClientListDownloadService
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
            $header = Client::downloadHeaderAtClientList();
            fputcsv($handle, $header);
            // レコードをチャンクごとに書き込む
            $clients->chunk($chunk_size, function ($clients) use ($handle){
                // 顧客の分だけループ処理
                foreach($clients as $client){
                    // 変数に情報を格納
                    $row = [
                        $client->is_active_text,
                        $client->full_client_name,
                        $client->bases->pluck('base_name')->implode(' / '),
                        $client->base_clients
                                    ->flatMap(fn($base_client) => $base_client->item_sub_categories->pluck('item_category.item_category_name'))
                                    ->unique()
                                    ->implode(' / '),
                        $client->base_clients
                                    ->flatMap(fn($base_client) => $base_client->services)
                                    ->pluck('service_name')
                                    ->unique()
                                    ->implode(' / '),
                        $client->industry->industry_name,
                        $client->collection_term->collection_term.'日',
                        $client->account_type->account_type_name,
                        $client->client_code,
                        $client->client_postal_code,
                        $client->prefecture->prefecture_name,
                        $client->client_address,
                        $client->client_tel,
                        $client->client_invoice_number,
                        $client->representative_name,
                        $client->client_url,
                        $client->user->full_name,
                        CarbonImmutable::parse($client->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss'),
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