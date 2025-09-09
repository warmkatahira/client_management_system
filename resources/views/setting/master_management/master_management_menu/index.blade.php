<x-app-layout>
    <x-page-back :url="route('setting_menu.index')" />
    <div class="grid grid-cols-12 gap-5 mt-5">
        <x-menu.button route="item_category.index" title="取扱品目" content="取扱品目の管理" />
        <x-menu.button route="industry.index" title="業種" content="業種の管理" />
        <x-menu.button route="service.index" title="提供内容" content="提供内容の管理" />
    </div>
</x-app-layout>