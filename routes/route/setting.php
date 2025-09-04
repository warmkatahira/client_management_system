<?php

use Illuminate\Support\Facades\Route;

// +-+-+-+-+-+-+-+- 設定メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\SettingMenu\SettingMenuController;
// +-+-+-+-+-+-+-+- マスタ管理メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\MasterManagement\MasterManagementMenu\MasterManagementMenuController;
// +-+-+-+-+-+-+-+- 取扱品目 +-+-+-+-+-+-+-+-
use App\Http\Controllers\Setting\MasterManagement\ItemCategory\ItemCategoryController;

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
});