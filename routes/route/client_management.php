<?php

use Illuminate\Support\Facades\Route;

// +-+-+-+-+-+-+-+- 顧客管理メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\ClientManagement\ClientManagementMenu\ClientManagementMenuController;
// +-+-+-+-+-+-+-+- 顧客リスト +-+-+-+-+-+-+-+-
use App\Http\Controllers\ClientManagement\ClientList\ClientListController;
use App\Http\Controllers\ClientManagement\ClientList\ClientListDownloadController;
// +-+-+-+-+-+-+-+- 顧客詳細 +-+-+-+-+-+-+-+-
use App\Http\Controllers\ClientManagement\ClientDetail\ClientDetailController;
// +-+-+-+-+-+-+-+- 顧客売上リスト +-+-+-+-+-+-+-+-
use App\Http\Controllers\ClientManagement\ClientSalesList\ClientSalesListController;
use App\Http\Controllers\ClientManagement\ClientSalesList\ClientSalesListDownloadController;

Route::middleware('common')->group(function (){
    // +-+-+-+-+-+-+-+- 顧客管理メニュー +-+-+-+-+-+-+-+-
    Route::controller(ClientManagementMenuController::class)->prefix('client_management_menu')->name('client_management_menu.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    // +-+-+-+-+-+-+-+- 顧客リスト +-+-+-+-+-+-+-+-
    Route::controller(ClientListController::class)->prefix('client_list')->name('client_list.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    Route::controller(ClientListDownloadController::class)->prefix('client_list_download')->name('client_list_download.')->group(function(){
        Route::get('download', 'download')->name('download');
    });
    // +-+-+-+-+-+-+-+- 顧客詳細 +-+-+-+-+-+-+-+-
    Route::controller(ClientDetailController::class)->prefix('client_detail')->name('client_detail.')->group(function(){
        Route::get('', 'index')->name('index');
        Route::get('ajax_get_chart_data', 'ajax_get_chart_data');
    });
    // +-+-+-+-+-+-+-+- 顧客売上リスト +-+-+-+-+-+-+-+-
    Route::controller(ClientSalesListController::class)->prefix('client_sales_list')->name('client_sales_list.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    Route::controller(ClientSalesListDownloadController::class)->prefix('client_sales_list_download')->name('client_sales_list_download.')->group(function(){
        Route::get('download', 'download')->name('download');
    });
});