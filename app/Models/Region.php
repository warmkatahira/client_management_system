<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'region_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'region_name',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('region_id', 'asc');
    }
}
