<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientItem extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'client_item_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_item_name',
        'sort_order',
    ];
}
