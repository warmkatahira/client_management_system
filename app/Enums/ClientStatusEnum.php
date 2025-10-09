<?php

namespace App\Enums;

enum ClientStatusEnum
{
    const PRE       = 1;    // 取引前
    const ACTIVE    = 2;    // 取引中
    const EXIT      = 3;    // 取引終了
}