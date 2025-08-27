<?php

namespace App\Enums;

enum SystemEnum
{
    // システム名
    const SYSTEM_NAME  = 'CMS';
    // ページネーションの値を定義
    const PAGINATE_DEFAULT = 50;
    const PAGINATE_OPERATION_LOG = 200;
    // 初期プロフィール画像のファイル名を定義
    const DEFAULT_PROFILE_IMAGE_FILE_NAME = 'no_image.png';
    // 初期商品画像のファイル名を定義
    const DEFAULT_ITEM_IMAGE_FILE_NAME = 'no_image.png';
    // 初期受注区分画像のファイル名を定義
    const DEFAULT_ORDER_CATEGORY_IMAGE_FILE_NAME = 'no_image.png';
}