<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseClient extends Model
{
    // テーブル名を定義
    protected $table = 'base_client';
    // 主キーを使用しない
    protected $primaryKey = 'base_client_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_id',
        'base_id',
    ];
    // basesテーブルとのリレーション
    public function base()
    {
        return $this->belongsTo(Base::class, 'base_id', 'base_id');
    }
    // item_sub_categoriesテーブルとのリレーション
    public function item_sub_categories()
    {
        return $this->belongsToMany(
            ItemSubCategory::class,
            'base_client_item_sub_category',
            'base_client_id',
            'item_sub_category_id'
        );
    }
    // servicesテーブルとのリレーション
    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'base_client_service',
            'base_client_id',
            'service_id'
        );
    }
}
