<x-app-layout>
    <div class="flex flex-row my-3">
        <x-client-management.client-sales-list.operation-div />
        <x-pagination :pages="$clients" />
        <x-client-management.client-sales-list.sort-switch />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-client-management.client-sales-list.search route="client_sales_list.index" :bases="$bases" />
        <x-client-management.client-sales-list.list :clients="$clients" />
    </div>
</x-app-layout>
@vite(['resources/js/client_management/client_sales_list/client_sales_list.js'])