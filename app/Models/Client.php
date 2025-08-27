<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'client_id';
    // 操作可能なカラムを定義
    protected $fillable = [
        'client_code',
        'client_name',
        'client_postal_code',
        'client_address',
        'client_tel',
        'client_url',
        'client_invoice_number',
        'client_image_file_name',
        'company_type_id',
        'industry_id',
        'account_type_id',
        'base_id',
        'sort_order',
        'is_active',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // basesテーブルとのリレーション
    public function base()
    {
        return $this->belongsTo(Base::class, 'base_id', 'base_id');
    }
    // company_typesテーブルとのリレーション
    public function company_type()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id', 'company_type_id');
    }
    // industriesテーブルとのリレーション
    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'industry_id');
    }
    // account_typesテーブルとのリレーション
    public function account_type()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id', 'account_type_id');
    }
    // is_activeの値によって文字列を返すアクセサ
    public function getFullClientNameAttribute()
    {
        // 会社種別の前後位置が「前」の場合
        if($this->company_type->position === 'front'){
            return $this->company_type->company_type_name . $this->client_name;
        }
        // 会社種別の前後位置が「後」の場合
        if($this->company_type->position === 'back'){
            return $this->client_name . $this->company_type->company_type_name;
        }
    }
    // is_activeの値によって文字列を返すアクセサ
    public function getIsActiveTextAttribute()
    {
        return $this->is_active ? '有効' : '無効';
    }
}
