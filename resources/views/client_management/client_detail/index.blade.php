<x-app-layout>
    <x-page-back :url="session('back_url_1')" />
    <div class="py-5 space-y-8 w-1/2">
        <x-client-management.client-detail.client-info :client="$client" />

        
    </div>
    <x-client-management.client-detail.client-sales-chart />
</x-app-layout>
@vite(['resources/js/client_management/client_detail/client_detail.js'])