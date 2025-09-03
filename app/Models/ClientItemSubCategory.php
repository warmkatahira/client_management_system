<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientItemSubCategory extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'client_item_sub_category_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_item_category_id',
        'client_item_sub_category_name',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // client_item_categoriesテーブルとのリレーション
    public function client_item_category()
    {
        return $this->belongsTo(ClientItemCategory::class, 'client_item_category_id', 'client_item_category_id');
    }
}
