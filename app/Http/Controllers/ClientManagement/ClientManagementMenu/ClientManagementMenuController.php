<?php

namespace App\Http\Controllers\ClientManagement\ClientManagementMenu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientManagementMenuController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '顧客管理メニュー']);
        return view('client_management.client_management_menu.index')->with([
        ]);
    }
}