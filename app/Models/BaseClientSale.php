<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseClientSale extends Model
{
    // 主キーを使用しない
    protected $primaryKey = 'base_client_sales_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'base_client_id',
        'year_month',
        'amount',
    ];
}
