<?php

// その他
use Carbon\CarbonImmutable;

if(!function_exists('formatYearMonth')){
    // yyyy-mm形式をyyyy年mm月にフォーマット化
    function formatYearMonth($year_month)
    {
        // 値がnull・空、またはyyyy-mmの形式でない場合は空文字を返す
        if(empty($year_month) || !preg_match('/^\d{4}-\d{2}$/', $year_month)){
            return '';
        }
        // フォーマット化
        return CarbonImmutable::createFromFormat('Y-m', $year_month)->format('Y年m月');
    }
}

if(!function_exists('display_value')){
    // 値がなければ、未登録を返す
    function display_value($value)
    {
        return $value !== null && $value !== '' ? $value : '未登録';
    }
}