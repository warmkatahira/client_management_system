<?php

namespace App\Http\Controllers\ClientManagement\ClientList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Base;
use App\Models\Industry;
// サービス
use App\Services\ClientManagement\ClientList\ClientSearchService;
use App\Services\Common\CommonService;
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
        // セッションを削除
        $ClientSearchService->deleteSession();
        // セッションに検索条件を格納
        $ClientSearchService->setSearchCondition($request);
        // 検索結果を取得
        $result = $ClientSearchService->getSearchResult();
        // ページネーションを実施
        $clients = $this->setPagination($result);
        // 倉庫を取得
        $bases = Base::getAll()->get();
        // 業種を取得
        $industries = Industry::getAll()->get();
        return view('client_management.client_list.index')->with([
            'clients' => $clients,
            'bases' => $bases,
            'industries' => $industries,
        ]);
    }
}