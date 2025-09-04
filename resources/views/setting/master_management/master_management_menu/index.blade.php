<x-app-layout>
    <x-page-back :url="route('setting_menu.index')" />
    <div class="grid grid-cols-12 gap-5 mt-5">
        <x-menu.button route="item_category.index" title="取扱品目" content="取扱品目の管理" />
    </div>
</x-app-layout>