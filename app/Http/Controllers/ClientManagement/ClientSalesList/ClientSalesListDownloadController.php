<?php

namespace App\Http\Controllers\ClientManagement\ClientSalesList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\ClientManagement\ClientSalesList\ClientSalesSearchService;
use App\Services\ClientManagement\ClientSalesList\ClientSalesListDownloadService;
// その他
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ClientSalesListDownloadController extends Controller
{   
    public function download(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客リスト']);
        // インスタンス化
        $ClientSalesSearchService = new ClientSalesSearchService;
        $ClientSalesListDownloadService = new ClientSalesListDownloadService;
        // 検索結果を取得
        $result = $ClientSalesSearchService->getSearchResult();
        // ダウンロードするデータを取得
        $response = $ClientSalesListDownloadService->getDownloadData($result);
        // ダウンロード処理
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename=【'.SystemEnum::SYSTEM_NAME.'】顧客売上リスト_' . CarbonImmutable::now()->isoFormat('Y年MM月DD日HH時mm分ss秒') . '.csv');
        return $response;
        
    }
}