<?php

namespace App\Services\Dashboard;

// モデル
use App\Models\BaseClientSale;
use App\Models\SalesRank;

class ChartService
{
    // 売上ランク単位の顧客数を集計
    public function getClientCountBySalesRank()
    {
        // 指定月の売上を取得
        $sales = BaseClientSale::where('year_month', '2025-09')->get();
        // 売上ランクマスタをmin_amountの昇順で取得
        $ranks = SalesRank::orderBy('min_amount', 'asc')->get();
        // 売上ランクを紐付ける
        $sales_with_rank = $sales->map(function ($sale) use ($ranks) {
            $rank = $ranks->first(function ($r) use ($sale) {
                return $sale->amount >= $r->min_amount
                    && (is_null($r->max_amount) || $sale->amount <= $r->max_amount);
            });
            // ランク名を結果に追加
            $sale->sales_rank_name = $rank ? $rank->sales_rank_name : null;
            return $sale;
        });
        // ランク名を調整
        $rank_labels = $ranks->mapWithKeys(function ($rank) {
            $label = $rank->sales_rank_name . ' (' . number_format($rank->min_amount) . '〜';
            $label .= $rank->max_amount ? number_format($rank->max_amount) : '上限なし';
            $label .= ')';
            return [$rank->sales_rank_name => $label];
        });
        // 件数集計して、ラベルを付与
        return $sales_with_rank
            ->groupBy('sales_rank_name')
            ->map(function ($group, $rank_name) use ($rank_labels) {
                return [
                    'sales_rank_name' => $rank_labels[$rank_name] ?? $rank_name,
                    'count' => $group->count(),
                ];
            })
            ->sortByDesc('count');
    }
}