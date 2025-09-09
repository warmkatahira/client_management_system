<?php

namespace App\Http\Controllers\Setting\MasterManagement\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\Setting\MasterManagement\Service\ServiceSearchService;
use App\Services\Setting\MasterManagement\Service\ServiceDownloadService;
// その他
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ServiceDownloadController extends Controller
{   
    public function download(Request $request)
    {
        // インスタンス化
        $ServiceSearchService = new ServiceSearchService;
        $ServiceDownloadService = new ServiceDownloadService;
        // 検索結果を取得
        $result = $ServiceSearchService->getSearchResult();
        // ダウンロードするデータを取得
        $response = $ServiceDownloadService->getDownloadData($result);
        // ダウンロード処理
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename=【'.SystemEnum::SYSTEM_NAME.'】提供内容_' . CarbonImmutable::now()->isoFormat('Y年MM月DD日HH時mm分ss秒') . '.csv');
        return $response;
        
    }
}