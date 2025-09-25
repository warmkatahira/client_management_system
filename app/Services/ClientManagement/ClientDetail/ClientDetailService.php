<?php

namespace App\Services\ClientManagement\ClientDetail;

// モデル
use App\Models\BaseClientSale;
use App\Models\FiscalTerm;
// その他
use Illuminate\Support\Facades\DB;
use Carbon\CarbonImmutable;

class ClientDetailService
{
    // 期の情報を取得
    public function getTermInfo()
    {
        // 現在の日時を取得
        $nowDate = CarbonImmutable::now();
        // 今期を取得
        $current_fiscal_term = FiscalTerm::getSpecifyByStartEnd($nowDate->format('Y-m'))->first();
        // 前期を取得
        $last_term_number = intval($current_fiscal_term->term_number) - 1;
        $last_fiscal_term = FiscalTerm::getSpecifyByTermNumber($last_term_number)->first();
        // 現在が9月以前の場合かそれ以外かで条件分岐
        if($nowDate->month <= 9){
            // 今期：9月以前 → 前年10月〜今年9月
            $current_term_start = ($nowDate->year - 1) . '-10';
            $current_term_end   = $nowDate->year . '-09';
            // 前期：さらに1年前
            $last_term_start = ($nowDate->year - 2) . '-10';
            $last_term_end   = ($nowDate->year - 1) . '-09';
        }else{
            // 今期：10月以降 → 今年10月〜翌年9月
            $current_term_start = $nowDate->year . '-10';
            $current_term_end   = ($nowDate->year + 1) . '-09';
            // 前期：去年10月〜今年9月
            $last_term_start = ($nowDate->year - 1) . '-10';
            $last_term_end   = $nowDate->year . '-09';
        }
        // 表示用に「YYYY年MM月」形式に整形
        $current_term_text  = CarbonImmutable::createFromFormat('Y-m', $current_term_start)->format('Y年m月'). '～' .CarbonImmutable::createFromFormat('Y-m', $current_term_end)->format('Y年m月');
        $last_term_text     = CarbonImmutable::createFromFormat('Y-m', $last_term_start)->format('Y年m月'). '～' .CarbonImmutable::createFromFormat('Y-m', $last_term_end)->format('Y年m月');
        return compact(
            'current_term_start', 'current_term_end', 'current_term_text', 'current_fiscal_term',
            'last_term_start', 'last_term_end', 'last_term_text', 'last_fiscal_term',
        );
    }

    // 売上サマリーを取得
    public function getSalesSummary($client, $term_start, $term_end)
    {
        // 売上サマリーを取得
        return BaseClientSale::query()
                    ->join('base_client', 'base_client.base_client_id', '=', 'base_client_sales.base_client_id')
                    ->join('bases', 'bases.base_id', '=', 'base_client.base_id')
                    ->where('base_client.client_id', $client->client_id)
                    ->whereBetween('base_client_sales.year_month', [
                         $term_start,
                        $term_end,
                    ])
                    ->select(
                        'base_client_sales.base_client_id',
                        'bases.base_name',
                        DB::raw('SUM(base_client_sales.amount) as total_amount'),
                        DB::raw('COUNT(*) as month_count'),
                        DB::raw('SUM(base_client_sales.amount) / COUNT(*) as monthly_average')
                    )
                    ->groupBy('base_client_sales.base_client_id', 'bases.base_name')
                    ->orderBy('bases.sort_order', 'asc')
                    ->get();
    }
}