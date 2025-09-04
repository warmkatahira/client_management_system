<?php

namespace App\Http\Controllers\ClientManagement\ClientList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Base;
use App\Models\Industry;
use App\Models\AccountType;
use App\Models\ItemCategory;
use App\Models\Service;
// サービス
use App\Services\ClientManagement\ClientList\ClientSearchService;
// トレイト
use App\Traits\PaginatesResults;

class ClientListController extends Controller
{
    use PaginatesResults;
    
    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客リスト']);
        // インスタンス化
        $ClientSearchService = new ClientSearchService;
        // 表示切り替えのみを意味するパラメータが、True以外の場合
        if(!$request->display_change_only){
            // セッションを削除
            $ClientSearchService->deleteSession();
            // セッションに検索条件を格納
            $ClientSearchService->setSearchCondition($request);
        }
        // セッションに表示タイプを格納
        $ClientSearchService->setDisplayType($request->display_type);
        // 検索結果を取得
        $result = $ClientSearchService->getSearchResult();
        // ページネーションを実施
        $clients = $this->setPagination($result);
        // 倉庫を取得
        $bases = Base::getAll()->get();
        // 業種を取得
        $industries = Industry::getAll()->get();
        // 取引種別を取得
        $account_types = AccountType::getAll()->get();
        // 取扱品目(大)を取得
        $item_categories = ItemCategory::getAll()->get();
        // 提供内容を取得
        $services = Service::getAll()->get();
        return view('client_management.client_list.index')->with([
            'clients' => $clients,
            'bases' => $bases,
            'industries' => $industries,
            'account_types' => $account_types,
            'item_categories' => $item_categories,
            'services' => $services,
        ]);
    }
}