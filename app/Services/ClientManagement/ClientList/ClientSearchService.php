<?php

namespace App\Services\ClientManagement\ClientList;

// モデル
use App\Models\Client;
// 列挙
use App\Enums\SystemEnum;
// その他
use Illuminate\Support\Facades\DB;

class ClientSearchService
{
    // セッションを削除
    public function deleteSession()
    {
        session()->forget([
            'search_base_id',
            'search_industry_id',
            'search_account_type_id',
            'search_client_code',
            'search_client_name',
            'search_is_active',
            'search_item_category_id',
            'search_client_service_id',
        ]);
    }

    // セッションに検索条件を格納
    public function setSearchCondition($request)
    {
        // 変数が存在しない場合は検索が実行されていないので、初期条件をセット
        if(!isset($request->search_type)){
            session(['search_is_active' => '1']);
        }
        // 「search」なら検索が実行されているので、検索条件をセット
        if($request->search_type === 'search'){
            session(['search_base_id' => $request->search_base_id]);
            session(['search_industry_id' => $request->search_industry_id]);
            session(['search_account_type_id' => $request->search_account_type_id]);
            session(['search_client_code' => $request->search_client_code]);
            session(['search_client_name' => $request->search_client_name]);
            session(['search_is_active' => $request->search_is_active]);
            session(['search_item_category_id' => $request->search_item_category_id]);
            session(['search_client_service_id' => $request->search_client_service_id]);
        }
    }

    // セッションに表示タイプを格納
    public function setDisplayType($display_type)
    {
        // 現在のURLを取得
        session(['back_url_1' => url()->full()]);
        // 表示タイプ条件がある場合
        if(isset($display_type)){
            session(['display_type' => $display_type]);
        }
        // 表示タイプ条件がない場合
        if(!isset($display_type)){
            session(['display_type' => 'list']);
        }
    }

    // 検索結果を取得
    public function getSearchResult()
    {
        // クエリをセット(basesのsort_orderが一番小さい値を取得している)
        $query = Client::query()
                ->select('clients.*')
                ->selectSub(function ($q) {
                    $q->from('base_client')
                    ->join('bases', 'base_client.base_id', 'bases.base_id')
                    ->selectRaw('MIN(bases.sort_order)')
                    ->whereColumn('base_client.client_id', 'clients.client_id');
                }, 'min_base_sort_order')
                ->with([
                    'user',
                    'industry',
                    'account_type',
                    'collection_term',
                    'base_clients.services',
                    'base_clients.item_sub_categories.item_category',
                ]);
        // 管轄倉庫の条件がある場合
        if(session('search_base_id') != null){
            // 条件を指定して取得
            $query->whereHas('bases', function ($q){
                $q->where('bases.base_id', session('search_base_id'));
            });
        }
        // 業種の条件がある場合
        if(session('search_industry_id') != null){
            // 条件を指定して取得
            $query->where('clients.industry_id', session('search_industry_id'));
        }
        // 取引種別の条件がある場合
        if(session('search_account_type_id') != null){
            // 条件を指定して取得
            $query->where('clients.account_type_id', session('search_account_type_id'));
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
        // 取扱品目(大)の条件がある場合
        if(session('search_item_category_id') != null){
            // 条件を指定して取得
            $query->whereHas('item_sub_categories', function ($q) {
                $q->where('item_sub_categories.item_category_id', session('search_item_category_id'));
            });
        }
        // 提供内容の条件がある場合
        if(session('search_client_service_id') != null){
            // 条件を指定して取得
            $query->whereHas('client_services', function ($q){
                $q->where('client_services.client_service_id', session('search_client_service_id'));
            });
        }
        // 並び替えを実施
        return $query->orderBy('min_base_sort_order', 'asc')->orderBy('clients.sort_order', 'asc')->orderBy('clients.client_id', 'asc');
    }
}