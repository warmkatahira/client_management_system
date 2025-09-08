<?php

namespace App\Services\ClientManagement\ClientSalesList;

// モデル
use App\Models\Client;
// 列挙
use App\Enums\SystemEnum;
// その他
use Illuminate\Support\Facades\DB;
use Carbon\CarbonImmutable;

class ClientSalesSearchService
{
    // セッションを削除
    public function deleteSession()
    {
        session()->forget([
            'search_base_id',
            'search_client_code',
            'search_client_name',
            'search_is_active',
            'search_sales_year_month_from',
            'search_sales_year_month_to',
        ]);
    }

    // セッションに検索条件を格納
    public function setSearchCondition($request)
    {
        // 変数が存在しない場合は検索が実行されていないので、初期条件をセット
        if(!isset($request->search_type)){
            session(['search_is_active' => '1']);
            session(['search_sales_year_month_from'   => CarbonImmutable::now()->format('Y-m')]);
            session(['search_sales_year_month_to'     => CarbonImmutable::now()->format('Y-m')]);
        }
        // 「search」なら検索が実行されているので、検索条件をセット
        if($request->search_type === 'search'){
            session(['search_base_id' => $request->search_base_id]);
            session(['search_client_code' => $request->search_client_code]);
            session(['search_client_name' => $request->search_client_name]);
            session(['search_is_active' => $request->search_is_active]);
            session(['search_sales_year_month_from' => $request->search_sales_year_month_from]);
            session(['search_sales_year_month_to' => $request->search_sales_year_month_to]);
        }
    }

    // セッションに並び替え条件を格納
    public function setSortCondition($sort_condition)
    {
        // 現在のURLを取得
        session(['back_url_1' => url()->full()]);
        // 並び替え条件がある場合
        if(isset($sort_condition)){
            session(['sort_condition' => $sort_condition]);
        }
        // 並び替え条件がない場合
        if(!isset($sort_condition)){
            session(['sort_condition' => 'amount']);
        }
    }

    // 検索結果を取得
    public function getSearchResult()
    {
        // クエリをセット(basesのsort_orderが一番小さい値を取得している)
        $query = Client::join('base_client', 'base_client.client_id', 'clients.client_id')
                    ->join('bases', 'bases.base_id', 'base_client.base_id')
                    ->leftJoin('base_client_sales', 'base_client_sales.base_client_id', 'base_client.base_client_id')
                    ->whereBetween('base_client_sales.year_month', [
                        session('search_sales_year_month_from'),
                        session('search_sales_year_month_to'),
                    ]);
        // 倉庫の条件がある場合
        if(session('search_base_id') != null){
            // 条件を指定して取得
            $query->where('base_client.base_id', session('search_base_id'));
        }
        // 顧客コードの条件がある場合
        if(session('search_client_code') != null){
            // 条件を指定して取得
            $query->where('client_code', 'LIKE', '%'.session('search_client_code').'%');
        }
        // 顧客名の条件がある場合
        if(session('search_client_name') != null){
            // 条件を指定して取得
            $query->where('client_name', 'LIKE', '%'.session('search_client_name').'%');
        }
        // 取引中/停止の条件がある場合
        if(session('search_is_active') != null){
            // 条件を指定して取得
            $query->where('is_active', session('search_is_active'));
        }
        // 並び替え条件が売上金額順の場合
        if(session('sort_condition') === 'amount') {
            $query->orderBy('amount', 'desc');
        }
        // 共通の並び替えを実施
        return $query->orderBy('bases.sort_order', 'asc')
            ->orderBy('clients.sort_order', 'asc')
            ->orderBy('clients.client_id', 'asc')
            ->orderBy('year_month', 'asc');
    }
}