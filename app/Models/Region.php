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
    // prefecturesテーブルとのリレーション
    public function prefectures()
    {
        return $this->hasMany(Prefecture::class, 'region_id', 'region_id');
    }
    // 地域に属する顧客とのリレーション
    public function clients()
    {
        return $this->hasManyThrough(
            Client::class,      // 最終的に欲しいモデル
            Prefecture::class,  // 中間モデル
            'region_id',        // Prefectureの外部キー
            'prefecture_id',    // Clientの外部キー
            'region_id',        // Regionのローカルキー
            'prefecture_id'     // Prefectureのローカルキー
        );
    }
}
