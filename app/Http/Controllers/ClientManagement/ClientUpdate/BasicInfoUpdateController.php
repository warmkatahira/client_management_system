<?php

namespace App\Http\Controllers\ClientManagement\ClientUpdate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Client;
use App\Models\Prefecture;
use App\Models\CompanyType;
use App\Models\ClientStatus;
// サービス
use App\Services\ClientManagement\ClientUpdate\BasicInfoUpdateService;
// リクエスト
use App\Http\Requests\ClientManagement\ClientUpdate\BasicInfoUpdateRequest;
// その他
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class BasicInfoUpdateController extends Controller
{
    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客情報更新(基本情報)']);
        // 顧客を取得
        $client = Client::getSpecify($request->client_id)->first();
        // 都道府県を取得
        $prefectures = Prefecture::getAll()->get();
        // 会社種別を取得
        $company_types = CompanyType::getAll()->get();
        // 顧客ステータスを取得
        $client_statuses = ClientStatus::getAll()->get();
        return view('client_management.client_update.basic_info')->with([
            'client' => $client,
            'prefectures' => $prefectures,
            'company_types' => $company_types,
            'client_statuses' => $client_statuses,
        ]);
    }

    public function update(BasicInfoUpdateRequest $request)
    {
        try{
            DB::transaction(function () use ($request){
                // 顧客を取得
                $client = Client::getSpecify($request->client_id)->first();
                // インスタンス化
                $BasicInfoUpdateService = new BasicInfoUpdateService;
                // 顧客情報を更新
                $BasicInfoUpdateService->update($request, $client);
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