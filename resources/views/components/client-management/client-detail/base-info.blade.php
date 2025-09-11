<div class="bg-white rounded-2xl shadow-md p-6 col-span-6">
    <p class="text-lg mb-4 flex items-center">
        <span class="mr-1"><i class="las la-warehouse la-lg"></i></span>倉庫情報
    </p>
    <div class="grid grid-cols-12 gap-5">
        @foreach($client->base_clients as $base_client)
             @php
                // item_categoryごとにitem_sub_categoryをグループ化
                $item_categories = $base_client->item_sub_categories->groupBy(fn($sub) => $sub->item_category->item_category_name);
            @endphp
            <div class="{{ $client->base_clients->count() === 1 ? 'col-span-12' : 'col-span-6' }} bg-gradient-to-r from-theme-sub-g to-theme-main text-white  rounded-xl p-3 text-xs">
                <p class="text-base mb-3">{{ $base_client->base->base_name }}</p>
                <div class="flex flex-row">
                    <div class="pl-5">
                        <p class="text-sm">取扱品目</p>
                        @foreach($item_categories as $item_category_name => $item_sub_categories)
                            <p class="">・{{ $item_category_name }}</p>
                            <div class="ml-4">
                                @foreach($item_sub_categories as $item_sub_category)
                                    <p>∟{{ $item_sub_category->item_sub_category_name }}</p>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="pl-5">
                        <p class="text-sm">提供内容</p>
                        <div class="ml-4">
                            @foreach($base_client->services as $service)
                                <p class="">・{{ $service->service_name }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>