<?php

namespace App\Http\Controllers\ClientManagement\ClientSalesList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Base;
// サービス
use App\Services\ClientManagement\ClientSalesList\ClientSalesSearchService;
use App\Services\Common\CommonService;
// トレイト
use App\Traits\PaginatesResults;

class ClientSalesListController extends Controller
{
    use PaginatesResults;
    
    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客売上リスト']);
        // インスタンス化
        $ClientSalesSearchService = new ClientSalesSearchService;
        // セッションを削除
        $ClientSalesSearchService->deleteSession();
        // セッションに検索条件を格納
        $ClientSalesSearchService->setSearchCondition($request);
        // 検索結果を取得
        $result = $ClientSalesSearchService->getSearchResult();
        // ページネーションを実施
        $clients = $this->setPagination($result);
        // 倉庫を取得
        $bases = Base::getAll()->get();
        return view('client_management.client_sales_list.index')->with([
            'clients' => $clients,
            'bases' => $bases,
        ]);
    }
}