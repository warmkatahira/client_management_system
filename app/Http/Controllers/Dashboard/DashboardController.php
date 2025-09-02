<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Region;
use App\Models\Base;
// サービス
use App\Services\Dashboard\ChartService;

class DashboardController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => 'ダッシュボード']);
        return view('dashboard')->with([
        ]);
    }

    public function ajax_get_chart_data()
    {
        // インスタンス化
        $ChartService = new ChartService;
        // 地域単位の顧客数を集計
        $regions = Region::withCount('clients')->get();
        // 倉庫単位の顧客数を集計
        $bases = Base::withCount('clients')->orderBy('sort_order', 'asc')->get();
        // 売上ランク単位の顧客数を集計
        $sales_rank_counts = $ChartService->getClientCountBySalesRank();
        return response()->json([
            'regions' => $regions,
            'bases' => $bases,
            'sales_rank_counts' => $sales_rank_counts,
        ]);
    }
}