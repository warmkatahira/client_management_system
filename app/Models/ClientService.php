<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'client_service_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_service_name',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
}
