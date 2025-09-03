<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientClientItemSubCategory extends Model
{
    // テーブル名を定義
    protected $table = 'client_client_item_sub_category';
    // 主キーを使用しない
    protected $primaryKey = 'client_client_item_sub_category_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_id',
        'client_item_sub_category_id',
    ];
}
