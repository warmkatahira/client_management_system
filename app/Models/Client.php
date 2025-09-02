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
        'prefecture_id',
        'client_address',
        'client_tel',
        'client_url',
        'client_invoice_number',
        'client_image_file_name',
        'company_type_id',
        'industry_id',
        'account_type_id',
        'sort_order',
        'is_active',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // 指定したレコードを取得
    public static function getSpecify($client_id)
    {
        return self::where('client_id', $client_id);
    }
    // base_clientテーブルとのリレーション
    public function bases()
    {
        return $this->belongsToMany(Base::class, 'base_client', 'client_id', 'base_id')
                    ->orderBy('bases.sort_order', 'asc');
    }
    // client_client_itemテーブルとのリレーション
    public function client_items()
    {
        return $this->belongsToMany(ClientItem::class, 'client_client_item', 'client_id', 'client_item_id')
                    ->orderBy('client_items.sort_order', 'asc');
    }
    // client_client_serviceテーブルとのリレーション
    public function client_services()
    {
        return $this->belongsToMany(ClientService::class, 'client_client_service', 'client_id', 'client_service_id')
                    ->orderBy('client_services.sort_order', 'asc');
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
    // prefecturesテーブルとのリレーション
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class, 'prefecture_id', 'prefecture_id');
    }
    // 完全な住所を返すアクセサ
    public function getFullClientAddressAttribute()
    {
        return $this->prefecture->prefecture_name.$this->client_address;
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
    // base_client_salesを取得（中間テーブル経由）
    public function base_client_sales()
    {
        return $this->hasManyThrough(
            BaseClientSale::class, // 最終的に取得したいテーブル
            BaseClient::class,     // 中間テーブル
            'client_id',           // 中間テーブルの外部キー（Clientを参照）
            'base_client_id',      // 最終テーブルの外部キー（BaseClientを参照）
            'client_id',           // Clientのローカルキー
            'base_client_id'       // BaseClientのローカルキー
        )
        ->join('bases', 'base_client.base_id', 'bases.base_id')
        ->select('base_client_sales.*', 'bases.base_name')
        ->selectRaw("DATE_FORMAT(CONCAT(base_client_sales.year_month,'-01'), '%Y年%m月') as year_month_jp")
        ->whereBetween('base_client_sales.year_month', [
            now()->year . '-01',
            now()->year . '-12',
        ]);
    }
    // ダウンロード時のヘッダーを定義
    public static function downloadHeaderAtClientList()
    {
        return [
            '有効/無効',
            '顧客名',
            '管轄倉庫名',
            '取扱品目',
            '提供内容',
            '業種名',
            '取引種別名',
            '顧客コード',
            '顧客郵便番号',
            '顧客都道府県',
            '顧客住所',
            '顧客電話番号',
            '顧客インボイス番号',
            '顧客HP',
            '最終更新日時',
        ];
    }
    // ダウンロード時のヘッダーを定義
    public static function downloadHeaderAtClientSalesList()
    {
        return [
            '有効/無効',
            '売上年月',
            '倉庫名',
            '顧客コード',
            '顧客名',
            '売上金額',
        ];
    }
}
