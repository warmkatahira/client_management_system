<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function messages()
    {
        return [
            'required'                          => "「:attribute」は必須です。",
            'string'                            => "「:attribute」は文字列で入力して下さい。",
            'unique'                            => "「:attribute」は既に使用されています。",
            'image'                             => "「:attribute」は画像ファイルでなければなりません。",
            'mimes'                             => "「:attribute」は:values形式のみ許可されています。",
            'boolean'                           => "「:attribute」が正しくありません。",
            'exists'                            => "「:attribute」がシステムに存在しません。",
            'integer'                           => "「:attribute」は数値で入力して下さい。",
            'email'                             => "有効なメールアドレスを入力して下さい。",
            'unique'                            => "「:attribute」は既に使用されています。",
            'confirmed'                         => "「:attribute」が確認用と一致しません。",
            'date'                              => "「:attribute」が日付ではありません。",
            'max'                               => "「:attribute」は:max文字以内で入力して下さい。",
            'min'                               => "「:attribute」は:min以上で入力して下さい。",
            'sort_order.max'                    => "「:attribute」は:max以下で入力して下さい。",
        ];
    }

    public function attributes()
    {
        return [
            // 顧客
            'client_status_id'          => 'ステータス',
            'client_code'               => '顧客コード',
            'client_name'               => '顧客名',
            'client_postal_code'        => '郵便番号',
            'client_address'            => '住所',
            'client_tel'                => '電話番号',
            'representative_name'       => '代表取締役名',
            'company_type_id'           => '会社種別',
            'client_hp'                 => 'HP',
            'contract_start_date'       => '取引開始日',
            'contract_end_date'         => '取引終了日',
            // ユーザー情報
            'user_id'                   => 'ユーザーID',
            'last_name'                 => '姓',
            'first_name'                => '名',
            'email'                     => 'メールアドレス',
            'password'                  => 'パスワード',
            // 共通
            'is_active'                 => '有効/無効',
            'role_id'                   => '権限',
            'prefecture_id'             => '都道府県',
        ];
    }
}