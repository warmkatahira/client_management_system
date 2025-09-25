<?php

namespace App\Http\Controllers\ClientManagement\ClientDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Client;
use App\Models\BaseClientSale;
use App\Models\FiscalTerm;
// サービス
use App\Services\ClientManagement\ClientDetail\ClientSearchService;
use App\Services\ClientManagement\ClientDetail\ClientDetailService;
// その他
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class ClientDetailController extends Controller
{
    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客詳細']);
        // インスタンス化
        $ClientDetailService = new ClientDetailService;
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
        // 期の情報を取得
        $term = $ClientDetailService->getTermInfo();
        // 今期の売上サマリーを取得
        $current_term_sales_summaries = $ClientDetailService->getSalesSummary($client, $term['current_term_start'], $term['current_term_end']);
        // 前期の売上サマリーを取得
        $last_term_sales_summaries = $ClientDetailService->getSalesSummary($client, $term['last_term_start'], $term['last_term_end']);




        // 期の情報を取得
        $term = $ClientDetailService->getTermInfo();
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)->with('base_clients.base')->first();
        // 倉庫×顧客情報を取得
        $base_clients = $client->base_clients;
        // 倉庫名を結果に追加
        $base_clients = $client->base_clients->map(function($bc){
            return [
                'base_client_id' => $bc->base_client_id,
                'base_name' => $bc->base->base_name,
            ];
        });
        // 今年の売上を倉庫×顧客単位で取得
        $client_sales = $client->base_client_sales()->forTerm($term['current_term_start'], $term['current_term_end'])->get()->groupBy('base_client_id');
        
        // 取得した売上を整理
        $client_sales = $this->formatSales($client_sales, $term['current_term_start'], $term['current_term_end']);

        //dd($client_sales);


        return view('client_management.client_detail.index')->with([
            'client' => $client,
            'term' => $term,
            'current_term_sales_summaries' => $current_term_sales_summaries,
            'last_term_sales_summaries' => $last_term_sales_summaries,
        ]);
    }

    public function ajax_get_chart_data(Request $request)
    {
        // インスタンス化
        $ClientDetailService = new ClientDetailService;
        // 期の情報を取得
        $term = $ClientDetailService->getTermInfo();
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)->with('base_clients.base')->first();
        // 倉庫×顧客情報を取得
        $base_clients = $client->base_clients;
        // 倉庫名を結果に追加
        $base_clients = $client->base_clients->map(function($bc){
            return [
                'base_client_id' => $bc->base_client_id,
                'base_name' => $bc->base->base_name,
            ];
        });
        // 今年の売上を倉庫×顧客単位で取得
        $client_sales = $client->base_client_sales()->forTerm($term['current_term_start'], $term['current_term_end'])->get()->groupBy('base_client_id');
        // 取得した売上を整理
        $client_sales = $this->formatSales($client_sales, $term['current_term_start'], $term['current_term_end']);
        return response()->json([
            'base_clients' => $base_clients,
            'client_sales' => $client_sales,
            'term' => $term,
        ]);
    }

    public function ajax_get_sales_data(Request $request)
    {
        // インスタンス化
        $ClientDetailService = new ClientDetailService;
        // 期の情報を取得
        $term = FiscalTerm::getSpecifyByTermNumber($request->term_number)->first();
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)->first();
        // 指定された年の指定された倉庫顧客IDの売上を取得
        $client_sales = $client->base_client_sales()->forTerm($term->term_start, $term->term_end)->get()->groupBy('base_client_id')
                            ->filter(function($items, $key) use ($request) {
                                return (string)$key === (string)$request->base_client_id;
                            });
        // 取得した売上を整理
        $client_sales = $this->formatSales($client_sales, $term->term_start, $term->term_end);
        return response()->json([
            'client_sales' => $client_sales,
            'base_client_id' => $request->base_client_id,
        ]);
    }

    // 取得した売上を整理
    public function formatSales($client_sales, $term_start, $term_end)
    {
        // 期を取得
        $fiscal_term = FiscalTerm::getSpecifyByStartEnd($term_start)->first();
        // 配列を初期化
        $months = [];
        // 開始と終了の年月を変数に格納
        $current = CarbonImmutable::createFromFormat('Y-m', $term_start);
        $end     = CarbonImmutable::createFromFormat('Y-m', $term_end);
        // 開始から終了の配列を作成（yyyy-mm形式）
        while($current->lessThanOrEqualTo($end)){
            $months[] = $current->format('Y-m');
            $current = $current->addMonth();
        }
        // 配列をCollectionに変換
        $months = collect($months);
        // 倉庫×顧客単位で月データを補完
        return $client_sales->map(function ($sales, $base_client_id) use ($months, $fiscal_term) {
            // 倉庫名を取得
            $base_name = optional($sales->first())->base_name ?? '不明';
            // 月単位で処理を行う
            return $months->map(function ($ym) use ($sales, $base_name, $fiscal_term) {
                // 売上を取得
                $sale = $sales->firstWhere('year_month', $ym);
                return [
                    'term_number'       => $fiscal_term->term_number,
                    'year_month'        => $ym,
                    'year_month_jp'     => CarbonImmutable::parse($ym.'-01')->format('Y年m月'),
                    'amount'            => $sale->amount ?? null,
                    'base_name'         => $base_name,
                ];
            });
        });
    }
}