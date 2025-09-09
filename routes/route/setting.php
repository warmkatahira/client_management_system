<?php

use Illuminate\Support\Facades\Route;

// +-+-+-+-+-+-+-+- 設定メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\SettingMenu\SettingMenuController;
// +-+-+-+-+-+-+-+- マスタ管理メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\MasterManagement\MasterManagementMenu\MasterManagementMenuController;
// +-+-+-+-+-+-+-+- 取扱品目 +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\MasterManagement\ItemCategory\ItemCategoryController;
use App\Http\Controllers\Setting\MasterManagement\ItemCategory\ItemCategoryDownloadController;
// +-+-+-+-+-+-+-+- 業種 +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\MasterManagement\Industry\IndustryController;
use App\Http\Controllers\Setting\MasterManagement\Industry\IndustryDownloadController;
// +-+-+-+-+-+-+-+- 提供内容 +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\MasterManagement\Service\ServiceController;
use App\Http\Controllers\Setting\MasterManagement\Service\ServiceDownloadController;

Route::middleware('common')->group(function (){
    // +-+-+-+-+-+-+-+- 設定メニュー +-+-+-+-+-+-+-+-
    Route::controller(SettingMenuController::class)->prefix('setting_menu')->name('setting_menu.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    // +-+-+-+-+-+-+-+- マスタ管理メニュー +-+-+-+-+-+-+-+-
    Route::controller(MasterManagementMenuController::class)->prefix('master_management_menu')->name('master_management_menu.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    // +-+-+-+-+-+-+-+- 取扱品目 +-+-+-+-+-+-+-+-
    Route::controller(ItemCategoryController::class)->prefix('item_category')->name('item_category.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    Route::controller(ItemCategoryDownloadController::class)->prefix('item_category_download')->name('item_category_download.')->group(function(){
        Route::get('download', 'download')->name('download');
    });
    // +-+-+-+-+-+-+-+- 業種 +-+-+-+-+-+-+-+-
    Route::controller(IndustryController::class)->prefix('industry')->name('industry.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    Route::controller(IndustryDownloadController::class)->prefix('industry_download')->name('industry_download.')->group(function(){
        Route::get('download', 'download')->name('download');
    });
    // +-+-+-+-+-+-+-+- 提供内容 +-+-+-+-+-+-+-+-
    Route::controller(ServiceController::class)->prefix('service')->name('service.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    Route::controller(ServiceDownloadController::class)->prefix('service_download')->name('service_download.')->group(function(){
        Route::get('download', 'download')->name('download');
    });
});