<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSubCategory extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'item_sub_category_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'item_category_id',
        'item_sub_category_name',
        'sort_order',
        'updated_by',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // item_categoriesテーブルとのリレーション
    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id', 'item_category_id');
    }
    // base_clientsテーブルとのリレーション
    public function base_clients()
    {
        return $this->belongsToMany(
            BaseClient::class,
            'base_client_item_sub_category',
            'item_sub_category_id',
            'base_client_id'
        );
    }
    // usersテーブルとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_no');
    }
}
