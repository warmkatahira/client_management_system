<x-app-layout>
    <x-page-back :url="route('master_management_menu.index')" />
    <div class="flex flex-row my-3">
        <x-setting.master-management.item-category.operation-div />
        <x-pagination :pages="$item_categories" />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-setting.master-management.item-category.list :itemCategories="$item_categories" />
    </div>
</x-app-layout>
@vite(['resources/js/setting/master_management/item_category/item_category.js'])