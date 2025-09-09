<?php

namespace App\Services\Setting\MasterManagement\Service;

// モデル
use App\Models\Service;
// 列挙
use App\Enums\SystemEnum;
// その他
use Illuminate\Support\Facades\DB;

class ServiceSearchService
{
    // セッションを削除
    public function deleteSession()
    {
        session()->forget([
        ]);
    }

    // セッションに検索条件を格納
    public function setSearchCondition($request)
    {
        // 変数が存在しない場合は検索が実行されていないので、初期条件をセット
        if(!isset($request->search_type)){
        }
        // 「search」なら検索が実行されているので、検索条件をセット
        if($request->search_type === 'search'){
        }
    }

    // 検索結果を取得
    public function getSearchResult()
    {
        // クエリをセット
        $query = Service::query()
                    ->withCount('clients');
        // 並び替えを実施
        return $query->orderBy('sort_order', 'asc')->orderBy('service_id', 'asc');
    }
}