<?php

namespace App\Enums;

enum OperationLogEnum
{
    // 操作ログの記録を行わないパスを定義
    const NO_OPERATION_RECORD_PATH = [
        // ダッシュボード
        'dashboard',
        'dashboard/ajax_get_chart_data',
        // 顧客管理
        'client_management_menu',
        // システム管理
        'system_admin_menu',
        'base',
        'base_create',
        'base_update',
        'user',
        'user_update',
        'operation_log',
        'operation_log_download/download',
    ];

    // パスの日本語変換用
    const PATH_JP_CHANGE_LIST = [
        // 顧客管理
        'client_list'                                       => '顧客リスト',
        'client_list_download'                              => '顧客リストダウンロード',
        // システム管理
        'base_update/update'                                => '倉庫更新',
        'base_create/create'                                => '倉庫追加',
        'user_update/update'                                => 'ユーザー更新',
        'profile'                                           => 'プロフィール',
        'billing_data_download/download'                    => '請求データダウンロード',
    ];

    // パスの日本語を取得
    public static function get_path_jp($key): string
    {
        if(array_key_exists($key, self::PATH_JP_CHANGE_LIST)){
            return self::PATH_JP_CHANGE_LIST[$key];
        }else{
            return $key;
        }
    }

    // ダウンロード時のヘッダーを定義
    public static function downloadHeader()
    {
        return [
            '操作日',
            '操作時間',
            'ユーザー名',
            'IPアドレス',
            'メソッド',
            'パス',
            'パラメータ',
        ];
    }
}