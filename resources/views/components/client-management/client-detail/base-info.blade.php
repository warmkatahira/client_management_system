<div class="bg-white rounded-2xl shadow-md p-6 col-span-6">
    <p class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-1"><i class="las la-warehouse la-lg"></i></span>倉庫情報
    </p>
    <div class="grid grid-cols-12 gap-5 text-gray-700">
        @foreach($client->base_clients as $base_client)
             @php
                // item_categoryごとにitem_sub_categoryをグループ化
                $item_categories = $base_client->item_sub_categories->groupBy(fn($sub) => $sub->item_category->item_category_name);
            @endphp
            <div class="col-span-6">
                <p class="text-base font-semibold underline">{{ $base_client->base->base_name }}</p>
                <div class="pl-5">
                    @foreach($item_categories as $item_category_name => $item_sub_categories)
                        <p class="text-gray-700">・{{ $item_category_name }}</p>
                        <ul class="ml-4 list-disc">
                            @foreach($item_sub_categories as $item_sub_category)
                                <p class="before:content-['➤'] before:mr-2 before:text-theme-main">{{ $item_sub_category->item_sub_category_name }}</p>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>