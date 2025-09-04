<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseClientItemSubCategory extends Model
{
    // テーブル名を定義
    protected $table = 'base_client_item_sub_category';
    // 主キーを使用しない
    protected $primaryKey = 'base_client_item_sub_category_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'base_client_id',
        'item_sub_category_id',
    ];
}
