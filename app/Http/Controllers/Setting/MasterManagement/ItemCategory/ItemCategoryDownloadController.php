<?php

namespace App\Http\Controllers\Setting\MasterManagement\ItemCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\Setting\MasterManagement\ItemCategory\ItemCategorySearchService;
use App\Services\Setting\MasterManagement\ItemCategory\ItemCategoryDownloadService;
// その他
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ItemCategoryDownloadController extends Controller
{   
    public function download(Request $request)
    {
        // インスタンス化
        $ItemCategorySearchService = new ItemCategorySearchService;
        $ItemCategoryDownloadService = new ItemCategoryDownloadService;
        // 検索結果を取得
        $result = $ItemCategorySearchService->getSearchResult();
        // ダウンロードするデータを取得
        $response = $ItemCategoryDownloadService->getDownloadData($result);
        // ダウンロード処理
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename=【'.SystemEnum::SYSTEM_NAME.'】取扱品目_' . CarbonImmutable::now()->isoFormat('Y年MM月DD日HH時mm分ss秒') . '.csv');
        return $response;
        
    }
}