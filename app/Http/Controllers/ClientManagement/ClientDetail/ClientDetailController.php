<?php

namespace App\Http\Controllers\ClientManagement\ClientDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Client;
use App\Models\BaseClientSale;
// サービス
use App\Services\ClientManagement\ClientDetail\ClientSearchService;
// その他
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class ClientDetailController extends Controller
{
    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客詳細']);
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)
                    ->with([
                        'user',
                        'industry',
                        'account_type',
                        'collection_term',
                        'base_clients.services',
                        'base_clients.item_sub_categories.item_category',
                    ])
                    ->first();
        // 売上サマリーを取得
        $sales_summaries = BaseClientSale::query()
                    ->join('base_client', 'base_client.base_client_id', '=', 'base_client_sales.base_client_id')
                    ->join('bases', 'bases.base_id', '=', 'base_client.base_id')
                    ->where('base_client.client_id', $client->client_id)
                    ->whereBetween('base_client_sales.year_month', [
                        now()->year . '-01',
                        now()->year . '-12',
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
        return view('client_management.client_detail.index')->with([
            'client' => $client,
            'sales_summaries' => $sales_summaries,
        ]);
    }

    public function ajax_get_chart_data(Request $request)
    {
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)->first();
        // 今年の売上を倉庫×顧客単位で取得
        $client_sales = $client->base_client_sales()->forYear(CarbonImmutable::now()->year)->get()->groupBy('base_client_id');
        // 今年の売上を取得
        $current_year_client_sales = $this->getSales($client_sales, CarbonImmutable::now()->year);
        // 昨年の売上を倉庫×顧客単位で取得
        $client_sales = $client->base_client_sales()->forYear(CarbonImmutable::now()->subYear()->year)->get()->groupBy('base_client_id');
        // 昨年の売上を取得
        $last_year_client_sales = $this->getSales($client_sales, CarbonImmutable::now()->subYear()->year);
        return response()->json([
            'current_year_client_sales' => $current_year_client_sales,
            'last_year_client_sales' => $last_year_client_sales,
        ]);
    }

    // 指定した年の売上を取得
    public function getSales($client_sales, $year)
    {
        // 1月〜12月の配列を作成（yyyy-mm形式）
        $months = collect(range(1, 12))->map(function ($m) use ($year) {
            return sprintf('%d-%02d', $year, $m);
        });
        // 倉庫×顧客単位で月データを補完
        return $client_sales->map(function ($sales, $base_client_id) use ($months) {
            // 倉庫名を取得
            $base_name = optional($sales->first())->base_name ?? '不明';
            // 月単位で処理を行う
            return $months->map(function ($ym) use ($sales, $base_name) {
                // 売上を取得
                $sale = $sales->firstWhere('year_month', $ym);
                return [
                    'year_month'    => $ym,
                    'year_month_jp' => CarbonImmutable::parse($ym.'-01')->format('Y年m月'),
                    'amount'        => $sale->amount ?? null,
                    'base_name'     => $base_name,
                ];
            });
        });
    }
}