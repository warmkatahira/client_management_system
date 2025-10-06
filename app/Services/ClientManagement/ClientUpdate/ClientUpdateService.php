<?php

namespace App\Services\ClientManagement\ClientUpdate;

// モデル
use App\Models\Client;

class ClientUpdateService
{
    // 顧客情報を更新
    public function updateClientAtBasicInfo($request, $client)
    {
        $client->update($request->only([
            'client_code',
            'client_name',
            'client_postal_code',
            'prefecture_id',
            'client_address',
            'client_tel',
            'representative_name',
            'company_type_id',
        ]));
    }
}