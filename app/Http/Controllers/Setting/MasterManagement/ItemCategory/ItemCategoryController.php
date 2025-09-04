<?php

namespace App\Http\Controllers\Setting\MasterManagement\ItemCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\ItemCategory;
// サービス
use App\Services\Setting\MasterManagement\ItemCategory\ItemCategorySearchService;
// トレイト
use App\Traits\PaginatesResults;

class ItemCategoryController extends Controller
{
    use PaginatesResults;

    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '取扱品目']);
        // インスタンス化
        $ItemCategorySearchService = new ItemCategorySearchService;
        // セッションを削除
        $ItemCategorySearchService->deleteSession();
        // セッションに検索条件を格納
        $ItemCategorySearchService->setSearchCondition($request);
        // 検索結果を取得
        $result = $ItemCategorySearchService->getSearchResult();
        // ページネーションを実施
        $item_categories = $this->setPagination($result);
        return view('setting.master_management.item_category.index')->with([
            'item_categories' => $item_categories,
        ]);
    }
}