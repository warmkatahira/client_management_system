<?php

namespace App\Http\Controllers\ClientManagement\ClientList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\ClientManagement\ClientList\ClientSearchService;
use App\Services\ClientManagement\ClientList\ClientListDownloadService;
// その他
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ClientListDownloadController extends Controller
{   
    public function download(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客リスト']);
        // インスタンス化
        $ClientSearchService = new ClientSearchService;
        $ClientListDownloadService = new ClientListDownloadService;
        // 検索結果を取得
        $result = $ClientSearchService->getSearchResult();
        // ダウンロードするデータを取得
        $response = $ClientListDownloadService->getDownloadData($result);
        // ダウンロード処理
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename=【'.SystemEnum::SYSTEM_NAME.'】顧客リスト_' . CarbonImmutable::now()->isoFormat('Y年MM月DD日HH時mm分ss秒') . '.csv');
        return $response;
        
    }
}