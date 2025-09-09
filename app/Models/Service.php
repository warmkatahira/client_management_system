<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'service_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'service_name',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // base_client_serviceテーブルとのリレーション
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'base_client_service', 'service_id', 'base_client_id');
    }
    // base_clientsテーブルとのリレーション
    public function base_clients()
    {
        return $this->belongsToMany(
            BaseClient::class,
            'base_client_service',
            'service_id',
            'base_client_id'
        );
    }
    // ダウンロード時のヘッダーを定義
    public static function downloadHeaderAtService()
    {
        return [
            '提供内容名',
            '並び順',
            '最終更新日時',
        ];
    }
}
