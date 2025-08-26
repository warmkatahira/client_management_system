<x-app-layout>
    <div class="flex flex-row my-3">
        <x-client-management.client-list.operation-div />
        <x-pagination :pages="$clients" />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-client-management.client-list.search route="client_list.index" :bases="$bases" :industries="$industries" />
        <x-client-management.client-list.list :clients="$clients" />
    </div>
</x-app-layout>
@vite(['resources/js/client_management/client_list/client_list.js'])