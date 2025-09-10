<div class="flex flex-row ml-5 mt-1 items-start divide-x divide-black border border-black">
    <!-- 売上金額順 -->
    <a href="{{ route('client_sales_list.index', ['sort_condition' => 'amount', 'sort_only' => true]) }}" class="btn tippy_sort_by_amount px-2 py-1 {{ session('sort_condition') === 'amount' ? 'bg-theme-sub-y' : 'bg-white' }}">
        <i class="las la-sort-amount-down la-2x"></i>
    </a>
    <!-- 倉庫順 -->
    <a href="{{ route('client_sales_list.index', ['sort_condition' => 'base', 'sort_only' => true]) }}" class="btn tippy_sort_by_base px-2 py-1 {{ session('sort_condition') === 'base' ? 'bg-theme-sub-y' : 'bg-white' }}">
        <i class="las la-sort-alpha-down la-2x"></i>
    </a>
</div>