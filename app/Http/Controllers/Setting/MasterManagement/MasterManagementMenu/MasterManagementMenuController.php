<?php

namespace App\Http\Controllers\Setting\MasterManagement\MasterManagementMenu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterManagementMenuController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => 'マスタ管理メニュー']);
        return view('setting.master_management.master_management_menu.index')->with([
        ]);
    }
}