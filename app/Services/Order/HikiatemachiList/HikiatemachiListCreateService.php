<?php

namespace App\Services\Order\HikiatemachiList;

// モデル
use App\Models\Order;
// 列挙
use App\Enums\OrderStatusEnum;
// その他
use Illuminate\Support\Facades\DB;

class HikiatemachiListCreateService
{
    public function getCreateItem()
    {
        // 未引当数を商品毎に集計して取得
        $unallocated_orders = Order::join('order_items', 'order_items.order_control_id', 'orders.order_control_id')
                                ->join('items', 'items.item_code', 'order_items.order_item_code')
                                ->join('bases', 'bases.base_id', 'orders.shipping_base_id')
                                ->where('order_status_id', OrderStatusEnum::HIKIATE_MACHI)
                                ->select(
                                    'base_name',
                                    'bases.sort_order as base_sort_order',
                                    'item_id',
                                    'item_code',
                                    'item_jan_code',
                                    'item_name',
                                    'items.sort_order as item_sort_order',
                                    DB::raw('SUM(order_items.unallocated_quantity) as total_unallocated_quantity'),
                                )
                                ->groupBy(
                                    'base_name',
                                    'base_sort_order',
                                    'item_id',
                                    'item_code',
                                    'item_jan_code',
                                    'item_name',
                                    'item_sort_order',
                                )
                                ->having('total_unallocated_quantity', '>', 0)
                                ->orderBy('item_sort_order', 'asc')
                                ->orderBy('item_code', 'asc')
                                ->get()
                                ->groupBy('base_name')
                                ->sortBy(function ($items, $base_name) {
                                    return $items->first()->base_sort_order;
                                });
        // 引当待ちの受注が無い場合
        if($unallocated_orders->isEmpty()){
            throw new \RuntimeException('引当待ちの受注がありません。');
        }
        return $unallocated_orders;
    }
}