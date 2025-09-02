<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientClientService extends Model
{
    // テーブル名を定義
    protected $table = 'client_client_service';
    // 主キーを使用しない
    protected $primaryKey = 'client_client_service_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_id',
        'client_service_id',
    ];
}
