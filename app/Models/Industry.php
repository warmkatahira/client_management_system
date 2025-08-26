<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'industry_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'industry_name',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
}
