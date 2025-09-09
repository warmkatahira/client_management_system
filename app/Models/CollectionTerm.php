<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionTerm extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'collection_term_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'collection_term',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
}
