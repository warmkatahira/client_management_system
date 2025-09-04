<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseClientService extends Model
{
    // テーブル名を定義
    protected $table = 'base_client_service';
    // 主キーを使用しない
    protected $primaryKey = 'base_client_service_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'base_client_id',
        'service_id',
    ];
}
