<x-app-layout>
    <x-page-back :url="session('back_url_1')" />
    <div class="py-5 grid grid-cols-12 gap-5">
        <x-client-management.client-detail.header :client="$client" />
        <x-client-management.client-detail.sales-summary :salesSummaries="$sales_summaries" />
        <x-client-management.client-detail.overview :client="$client" />
        <x-client-management.client-detail.base-info :client="$client" />
        <x-client-management.client-detail.sales-chart />
    </div>
</x-app-layout>
@vite(
        [
            'resources/js/client_management/client_detail/client_detail.js',
            'resources/js/client_management/client_detail/client_sales_chart.js',
        ]
    )