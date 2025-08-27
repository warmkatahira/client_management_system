<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'company_type_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'company_type_name',
        'company_type_short_name',
        'position',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
}
