<?php

namespace App\Http\Controllers\Setting\MasterManagement\Industry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\Setting\MasterManagement\Industry\IndustrySearchService;
use App\Services\Setting\MasterManagement\Industry\IndustryDownloadService;
// その他
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class IndustryDownloadController extends Controller
{   
    public function download(Request $request)
    {
        // インスタンス化
        $IndustrySearchService = new IndustrySearchService;
        $IndustryDownloadService = new IndustryDownloadService;
        // 検索結果を取得
        $result = $IndustrySearchService->getSearchResult();
        // ダウンロードするデータを取得
        $response = $IndustryDownloadService->getDownloadData($result);
        // ダウンロード処理
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename=【'.SystemEnum::SYSTEM_NAME.'】業種_' . CarbonImmutable::now()->isoFormat('Y年MM月DD日HH時mm分ss秒') . '.csv');
        return $response;
        
    }
}