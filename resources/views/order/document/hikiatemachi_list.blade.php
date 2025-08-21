<x-document-layout>
    <div class="page-container">
        @php
            // 変数を初期化
            $base_count = 0;
        @endphp
        @foreach($unallocated_orders as $base_name => $orders)
            <!-- 最初のページに余計なページがでないように、改ページをコントロールするためのカウント -->
            @php
                // 倉庫をカウント
                $base_count++;
            @endphp
            <div style="{{ $base_count != 1 ? 'page-break-before: always; padding-top: 0mm;' : '' }}">
                <div class="flex flex-row">
                    <div class="flex flex-col">
                        <span class="text-xl">引当待ちリスト</span>
                        <span>{{ SystemEnum::CUSTOMER_NAME }}出荷システム</span>
                    </div>
                </div>
                <p class="text-base mt-3"><span class="text-base">出荷倉庫：</span>{{ $base_name }}</p>
                <table class="w-full mt-5">
                    <thead>
                        <tr class="bg-theme-sub">
                            <th class="item_jan_code text-left py-2 font-thin">商品JANコード</th>
                            <th class="item_name text-left py-2 font-thin">商品名</th>
                            <th class="unallocated_quantity text-right py-2 font-thin pr-2">未引当数</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        @foreach($orders as $order)
                            <?php $count++; ?>
                            <!-- 偶数行だけ背景色を塗る -->
                            <tr class="@if($count % 2 == 0) bg-gray-200 @endif border-y border-black">
                                <td class="item_jan_code text-left py-2">{{ $order->item_jan_code }}</td>
                                <td class="item_name text-left py-2">{{ $order->item_name }}</td>
                                <td class="unallocated_quantity text-right py-2 pr-2 text-2xl">{{ number_format($order->total_unallocated_quantity) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-document-layout>
@vite(['resources/sass/order/document/hikiatemachi_list.scss'])