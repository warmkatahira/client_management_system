<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiscalTerm extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'fiscal_term_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'term_number',
        'term_start',
        'term_end',
    ];
    // 指定したレコードを取得
    public static function getSpecifyByStartEnd($date)
    {
        return self::where('term_start', '<=', $date)->where('term_end', '>=', $date);
    }
    // 指定したレコードを取得
    public static function getSpecifyByTermNumber($term_number)
    {
        return self::where('term_number', $term_number);
    }
}
