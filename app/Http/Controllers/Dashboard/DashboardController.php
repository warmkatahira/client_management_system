<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Region;
use App\Models\Base;
use App\Models\BaseClientSale;
use App\Models\SalesRank;

class DashboardController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => 'ダッシュボード']);
        // 指定月の売上を取得
        $sales = BaseClientSale::where('year_month', '2025-08')->get();
        // ランクマスタを min_amount の昇順で取得
        $ranks = SalesRank::orderBy('min_amount', 'asc')->get();
        // 
        $salesWithRank = $sales->map(function ($sale) use ($ranks) {
            // 
            $rank = $ranks->first(function ($r) use ($sale) {
                return $sale->amount >= $r->min_amount
                    && (is_null($r->max_amount) || $sale->amount <= $r->max_amount);
            });
            // ランク名を結果に追加（DBは更新しない）
            $sale->sales_rank_name = $rank ? $rank->sales_rank_name : null;
            return $sale;
        });
        $rankLabels = $ranks->mapWithKeys(function ($rank) {
            $label = $rank->sales_rank_name . ' (' . number_format($rank->min_amount) . '〜';
            $label .= $rank->max_amount ? number_format($rank->max_amount) : '∞';
            $label .= ')';
            return [$rank->sales_rank_name => $label];
        });
        // 件数集計して、ラベルを付与
        $rankCounts = $salesWithRank
            ->groupBy('sales_rank_name')
            ->map(function ($group, $rankName) use ($rankLabels) {
                return [
                    'sales_rank_name' => $rankLabels[$rankName] ?? $rankName,
                    'count' => $group->count(),
                ];
            })
            ->sortByDesc('count');
        //dd($sales, $ranks, $salesWithRank, $rankCounts);
        return view('dashboard')->with([
        ]);
    }

    public function ajax_get_chart_data()
    {
        // 地域単位の顧客数を集計
        $regions = Region::withCount('clients')->get();
        // 倉庫単位の顧客数を集計
        $bases = Base::withCount('clients')->orderBy('sort_order', 'asc')->get();


        // 指定月の売上を取得
        $sales = BaseClientSale::where('year_month', '2025-08')->get();
        // ランクマスタを min_amount の昇順で取得
        $ranks = SalesRank::orderBy('min_amount', 'asc')->get();
        // 
        $salesWithRank = $sales->map(function ($sale) use ($ranks) {
            // 
            $rank = $ranks->first(function ($r) use ($sale) {
                return $sale->amount >= $r->min_amount
                    && (is_null($r->max_amount) || $sale->amount <= $r->max_amount);
            });
            // ランク名を結果に追加（DBは更新しない）
            $sale->sales_rank_name = $rank ? $rank->sales_rank_name : null;
            return $sale;
        });
        $rankLabels = $ranks->mapWithKeys(function ($rank) {
            $label = $rank->sales_rank_name . ' (' . number_format($rank->min_amount) . '〜';
            $label .= $rank->max_amount ? number_format($rank->max_amount) : '上限なし';
            $label .= ')';
            return [$rank->sales_rank_name => $label];
        });
        // 件数集計して、ラベルを付与
        $sales_rank_counts = $salesWithRank
            ->groupBy('sales_rank_name')
            ->map(function ($group, $rankName) use ($rankLabels) {
                return [
                    'sales_rank_name' => $rankLabels[$rankName] ?? $rankName,
                    'count' => $group->count(),
                ];
            })
            ->sortByDesc('count');

        return response()->json([
            'regions' => $regions,
            'bases' => $bases,
            'sales_rank_counts' => $sales_rank_counts,
        ]);
    }
}