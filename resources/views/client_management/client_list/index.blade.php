<x-app-layout>
    <div class="flex flex-row my-3">
        <x-client-management.client-list.operation-div />
        <x-pagination :pages="$clients" />
        <x-client-management.client-list.display-switch />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-client-management.client-list.search route="client_list.index" :bases="$bases" :industries="$industries" :accountTypes="$account_types" :itemCategories="$item_categories" :services="$services" />
        @if(session('display_type') === 'list')
            <x-client-management.client-list.list :clients="$clients" />
        @endif
        @if(session('display_type') === 'card')
            <x-client-management.client-list.card :clients="$clients" />
        @endif
    </div>
</x-app-layout>
@vite(['resources/js/client_management/client_list/client_list.js'])