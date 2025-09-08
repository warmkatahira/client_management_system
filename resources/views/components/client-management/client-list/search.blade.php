<form method="GET" action="{{ route($route) }}" id="search_form">
    <p class="text-xs bg-black text-white py-1 text-center rounded-t-2xl">検索条件</p>
    <div class="flex flex-col gap-y-2 p-3 bg-white min-w-60 text-xs border border-black rounded-b-2xl">
        <x-search.select-boolean label="取引中/停止" id="search_is_active" label0="停止" label1="取引中" />
        <x-search.input type="text" label="顧客名" id="search_client_name" />
        <x-search.select label="管轄倉庫名" id="search_base_id" :selectItems="$bases" optionValue="base_id" optionText="base_name" />
        <x-search.select label="取扱品目(大)" id="search_item_category_id" :selectItems="$itemCategories" optionValue="item_category_id" optionText="item_category_name" />
        <x-search.select label="提供内容" id="search_client_service_id" :selectItems="$services" optionValue="service_id" optionText="client_service_name" />
        <x-search.select label="業種名" id="search_industry_id" :selectItems="$industries" optionValue="industry_id" optionText="industry_name" />
        <x-search.select label="取引種別名" id="search_account_type_id" :selectItems="$accountTypes" optionValue="account_type_id" optionText="account_type_name" />
        <x-search.input type="text" label="顧客コード" id="search_client_code" />
        <input type="hidden" name="display_type" value="{{ session('display_type') }}" >
        <input type="hidden" id="search_type" name="search_type" value="default">
        <div class="flex flex-row">
            <!-- 検索ボタン -->
            <button type="button" id="search_enter" class="btn bg-btn-enter p-3 text-white rounded w-5/12"><i class="las la-search la-lg mr-1"></i>検索</button>
            <!-- クリアボタン -->
            <button type="button" id="search_clear" class="btn bg-btn-cancel p-3 text-white rounded w-5/12 ml-auto"><i class="las la-eraser la-lg mr-1"></i>クリア</button>
        </div>
    </div>
</form>