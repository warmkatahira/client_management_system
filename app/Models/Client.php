<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'client_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_code',
        'client_name',
        'client_image_file_name',
        'base_id',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
}
