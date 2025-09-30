<div class="bg-white rounded-2xl shadow-md p-6 col-span-6">
    <p class="text-lg mb-4 flex items-center">
        <span class="mr-1"><i class="las la-yen-sign la-lg"></i></span>売上サマリー
    </p>
    <div class="flex flex-col gap-5">
        <div class="flex flex-col gap-3 items-center bg-gradient-to-r from-theme-sub-g to-theme-main text-white rounded-2xl shadow-lg p-6">
            <x-client-management.client-detail.sales-summary-info-1 label="合計売上" :termNumber="$term['last_fiscal_term']->term_number" :amount="$lastTermSalesSummaries->sum('total_amount')" />
            <x-client-management.client-detail.sales-summary-info-1 label="合計売上" :termNumber="$term['current_fiscal_term']->term_number" :amount="$currentTermSalesSummaries->sum('total_amount')" />
        </div>
        <div class="grid grid-cols-12 gap-5">
            @foreach($currentTermSalesSummaries as $sales_summary)
                <div class="{{ $currentTermSalesSummaries->count() === 1 ? 'col-span-12' : 'col-span-6' }} bg-gradient-to-r from-theme-sub-g to-theme-main text-white rounded-xl p-3">
                    <p class="text-base mb-3">{{ $sales_summary->base_name }}</p>
                    <div class="flex flex-col gap-1">
                        <div class="pl-5 flex flex-row gap-5 items-center">
                            <p class="w-1/2 text-base">今期売上</p>
                            <p class="w-1/2 text-2xl text-right">{{ number_format($sales_summary->total_amount) }}<span class="text-sm ml-2">円</span></p>
                        </div>
                        <div class="pl-5 flex flex-row gap-5 items-center">
                            <p class="w-1/2 text-base">月平均売上</p>
                            <p class="w-1/2 text-2xl text-right">{{ number_format($sales_summary->monthly_average) }}<span class="text-sm ml-2">円</span></p>
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