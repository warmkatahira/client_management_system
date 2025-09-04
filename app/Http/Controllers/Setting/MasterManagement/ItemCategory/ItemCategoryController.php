<?php

namespace App\Http\Controllers\Setting\MasterManagement\ItemCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\ItemCategory;

class ItemCategoryController extends Controller
{
    public function index(Request $request)
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '取扱品目']);
        // 取扱品目を取得
        $item_categories = ItemCategory::getAll()->get();
        return view('setting.master_management.item_category.index')->with([
            'item_categories' => $item_categories,
        ]);
    }
}