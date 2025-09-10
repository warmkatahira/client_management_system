<div class="bg-white rounded-2xl shadow-md p-6 col-span-6">
    <p class="text-lg font-semibold mb-4 flex items-center">
        <span class="mr-1"><i class="las la-yen-sign la-lg"></i></span>売上サマリー
    </p>
    <div class="flex flex-col gap-5">
        <div class="flex flex-row bg-green-100 rounded-xl p-5 items-center">
            <p class="w-1/2 text-base font-semibold">合計年間売上</p>
            <p class="w-1/2 text-2xl text-theme-main text-right">{{ number_format($salesSummaries->sum('total_amount')) }}<span class="text-sm ml-2">円</span></p>
        </div>
        <div class="grid grid-cols-12 gap-5">
            @foreach($salesSummaries as $sales_summary)
                <div class="{{ $salesSummaries->count() === 1 ? 'col-span-12' : 'col-span-6' }} bg-gray-100 rounded-xl p-3">
                    <p class="text-sm font-bold underline mb-3">{{ $sales_summary->base_name }}</p>
                    <div class="flex flex-col">
                        <div class="pl-5 flex flex-row gap-5 items-center">
                            <p class="w-1/2 text-base font-semibold">年間売上</p>
                            <p class="w-1/2 text-2xl text-theme-main text-right">{{ number_format($sales_summary->total_amount) }}<span class="text-sm ml-2">円</span></p>
                        </div>
                        <div class="pl-5 flex flex-row gap-5 items-center">
                            <p class="w-1/2 text-base font-semibold">月平均売上</p>
                            <p class="w-1/2 text-2xl text-theme-main text-right">{{ number_format($sales_summary->monthly_average) }}<span class="text-sm ml-2">円</span></p>
                        </div>
                        <div class="ml-auto">
                            <p class="text-sm">※{{ $sales_summary->month_count }}ヶ月実績</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>