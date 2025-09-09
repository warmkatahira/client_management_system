<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'item_category_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'item_category_name',
        'sort_order',
        'updated_by',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // usersテーブルとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_no');
    }
    // item_sub_categoriesテーブルとのリレーション
    public function item_sub_categories()
    {
        return $this->hasMany(ItemSubCategory::class, 'item_category_id', 'item_category_id');
    }
    // ダウンロード時のヘッダーを定義
    public static function downloadHeaderAtItemCategory()
    {
        return [
            '取扱品目名(大)',
            '取扱品目名(小)',
            '並び順',
            '最終更新者',
            '最終更新日時',
        ];
    }
}
