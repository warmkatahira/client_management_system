<div class="flex flex-row ml-5 mt-1 items-start divide-x divide-black border border-black">
    <!-- リスト形式 -->
    <a href="{{ route('client_list.index', ['display_type' => 'list', 'display_change_only' => true]) }}" class="btn tippy_list_display px-2 py-1 {{ session('display_type') === 'list' ? 'bg-theme-sub-y' : 'bg-white' }}">
        <i class="las la-th-list la-2x"></i>
    </a>
    <!-- カード形式 -->
    <a href="{{ route('client_list.index', ['display_type' => 'card', 'display_change_only' => true]) }}" class="btn tippy_card_display px-2 py-1 {{ session('display_type') === 'card' ? 'bg-theme-sub-y' : 'bg-white' }}">
        <i class="las la-th-large la-2x"></i>
    </a>
</div>