<x-app-layout>
    <x-page-back :url="route('master_management_menu.index')" />
    <div class="flex flex-row my-3">
        <x-setting.master-management.industry.operation-div />
        <x-pagination :pages="$industries" />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-setting.master-management.industry.list :industries="$industries" />
    </div>
</x-app-layout>