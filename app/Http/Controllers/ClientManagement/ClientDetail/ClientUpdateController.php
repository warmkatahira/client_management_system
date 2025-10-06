<?php

namespace App\Http\Controllers\ClientManagement\ClientDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Client;
use App\Models\Prefecture;
use App\Models\CompanyType;
// サービス
use App\Services\ClientManagement\ClientUpdate\ClientUpdateService;
// リクエスト
use App\Http\Requests\ClientManagement\ClientUpdate\ClientUpdateAtBasicInfoRequest;
// その他
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class ClientUpdateController extends Controller
{
    public function basic_info_index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客情報更新(基本情報)']);
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)->first();
        // 都道府県を取得
        $prefectures = Prefecture::getAll()->get();
        // 会社種別を取得
        $company_types = CompanyType::getAll()->get();
        return view('client_management.client_update.basic_info')->with([
            'client' => $client,
            'prefectures' => $prefectures,
            'company_types' => $company_types,
        ]);
    }

    public function basic_info_update(ClientUpdateAtBasicInfoRequest $request)
    {
        try{
            DB::transaction(function () use ($request){
                // 顧客を取得
                $client = Client::getSpecify($request->client_id)->first();
                // インスタンス化
                $ClientUpdateService = new ClientUpdateService;
                // 顧客情報を更新
                $ClientUpdateService->updateClientAtBasicInfo($request, $client);
            });
        }catch (\Exception $e){
            return redirect()->back()->with([
                'alert_type' => 'error',
                'alert_message' => $e->getMessage(),
            ]);
        }
        return redirect()->route('client_detail.index', ['client_id' => $request->client_id])->with([
            'alert_type' => 'success',
            'alert_message' => '顧客情報を更新しました。',
        ]);
    }
}