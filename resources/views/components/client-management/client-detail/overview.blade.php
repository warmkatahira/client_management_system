<div class="bg-white rounded-2xl shadow-md p-6 col-start-1 col-span-6">
    <p class="text-lg mb-4 flex items-center">
        <span class="mr-1"><i class="las la-building la-lg"></i></span>顧客情報
    </p>
    <div class="grid grid-cols-3 gap-5">
        <div>
            <span class="text-sm border-b-4 border-theme-main py-1">業種名</span>
            <p class="ml-3 mt-2">{{ $client->industry->industry_name }}</p>
        </div>
        <div>
            <span class="text-sm border-b-4 border-theme-main py-1">回収期間</span>
            <p class="ml-3 mt-2">{{ number_format($client->collection_term->collection_term) }}日</p>
        </div>
        <div>
            <span class="text-sm border-b-4 border-theme-main py-1">取引種別名</span>
            <p class="ml-3 mt-2">{{ $client->account_type->account_type_name }}</p>
        </div>
    </div>
</div>