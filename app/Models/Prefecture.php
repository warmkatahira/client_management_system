<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'prefecture_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'region_id',
        'prefecture_name',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('prefecture_id', 'asc');
    }
    // clientsテーブルとのリレーション
    public function clients()
    {
        return $this->hasMany(Client::class, 'prefecture_id', 'prefecture_id');
    }
}
