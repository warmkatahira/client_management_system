<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseClient extends Model
{
    // テーブル名を定義
    protected $table = 'base_client';
    // 主キーを使用しない
    protected $primaryKey = null;
    // オートインクリメント無効化
    public $incrementing = false;
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_id',
        'base_id',
    ];
}
