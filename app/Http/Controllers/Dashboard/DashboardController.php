<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Region;
use App\Models\Base;

class DashboardController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => 'ダッシュボード']);
        return view('dashboard')->with([
        ]);
    }

    public function ajax_get_chart_data()
    {
        // 
        $regions = Region::withCount('clients')->get();
        $bases = Base::withCount('clients')->orderBy('sort_order', 'asc')->get();
        return response()->json([
            'regions' => $regions,
            'bases' => $bases,
        ]);
    }
}