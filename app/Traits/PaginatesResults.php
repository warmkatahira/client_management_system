<?php

namespace App\Traits;

// 列挙
use App\Enums\SystemEnum;

trait PaginatesResults
{
    protected function setPagination($query)
    {
        return $query->paginate(SystemEnum::PAGINATE_DEFAULT);
    }
}