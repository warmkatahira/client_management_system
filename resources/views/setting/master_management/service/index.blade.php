<x-app-layout>
    <x-page-back :url="route('master_management_menu.index')" />
    <div class="flex flex-row my-3">
        <x-setting.master-management.service.operation-div />
        <x-pagination :pages="$services" />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-setting.master-management.service.list :services="$services" />
    </div>
</x-app-layout>