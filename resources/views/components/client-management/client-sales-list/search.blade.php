<form method="GET" action="{{ route($route) }}" id="search_form">
    <p class="text-xs bg-black text-white py-1 text-center rounded-t-2xl">検索条件</p>
    <div class="flex flex-col gap-y-2 p-3 bg-white min-w-60 text-xs border border-black rounded-b-2xl">
        <x-search.select-boolean label="取引中/停止" id="search_is_active" label0="停止" label1="取引中" />
        <x-search.date-period type="month" label="売上年月" fromId="search_sales_year_month_from" toId="search_sales_year_month_to" />
        <x-search.select label="倉庫名" id="search_base_id" :selectItems="$bases" optionValue="base_id" optionText="base_name" />
        <x-search.input type="text" label="顧客コード" id="search_client_code" />
        <x-search.input type="text" label="顧客名" id="search_client_name" />
        <input type="hidden" name="sort_condition" value="{{ session('sort_condition') }}" >
        <input type="hidden" id="search_type" name="search_type" value="default">
        <div class="flex flex-row">
            <!-- 検索ボタン -->
            <button type="button" id="search_enter" class="btn bg-btn-enter p-3 text-white rounded w-5/12"><i class="las la-search la-lg mr-1"></i>検索</button>
            <!-- クリアボタン -->
            <button type="button" id="search_clear" class="btn bg-btn-cancel p-3 text-white rounded w-5/12 ml-auto"><i class="las la-eraser la-lg mr-1"></i>クリア</button>
        </div>
    </div>
</form>