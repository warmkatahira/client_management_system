<?php

namespace App\Http\Controllers\Setting\MasterManagement\Industry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Industry;
// サービス
use App\Services\Setting\MasterManagement\Industry\IndustrySearchService;
// トレイト
use App\Traits\PaginatesResults;

class IndustryController extends Controller
{
    use PaginatesResults;

    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '業種']);
        // インスタンス化
        $IndustrySearchService = new IndustrySearchService;
        // セッションを削除
        $IndustrySearchService->deleteSession();
        // セッションに検索条件を格納
        $IndustrySearchService->setSearchCondition($request);
        // 検索結果を取得
        $result = $IndustrySearchService->getSearchResult();
        // ページネーションを実施
        $industries = $this->setPagination($result);
        return view('setting.master_management.industry.index')->with([
            'industries' => $industries,
        ]);
    }
}