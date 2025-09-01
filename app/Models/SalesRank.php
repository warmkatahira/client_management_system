<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesRank extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'sales_rank_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'sales_rank_name',
        'min_amount',
        'max_amount',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
}
