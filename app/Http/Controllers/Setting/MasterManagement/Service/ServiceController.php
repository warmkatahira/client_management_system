<?php

namespace App\Http\Controllers\Setting\MasterManagement\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Service;
// サービス
use App\Services\Setting\MasterManagement\Service\ServiceSearchService;
// トレイト
use App\Traits\PaginatesResults;

class ServiceController extends Controller
{
    use PaginatesResults;

    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '提供内容']);
        // インスタンス化
        $ServiceSearchService = new ServiceSearchService;
        // セッションを削除
        $ServiceSearchService->deleteSession();
        // セッションに検索条件を格納
        $ServiceSearchService->setSearchCondition($request);
        // 検索結果を取得
        $result = $ServiceSearchService->getSearchResult();
        // ページネーションを実施
        $services = $this->setPagination($result);
        return view('setting.master_management.service.index')->with([
            'services' => $services,
        ]);
    }
}