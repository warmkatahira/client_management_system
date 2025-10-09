<x-app-layout>
    <x-button.page-back :url="session('back_url_1')" />
    <div class="py-5 grid grid-cols-12 gap-5">
        <x-client-management.client-detail.basic-info :client="$client" />
        <x-client-management.client-detail.sales-summary :currentTermSalesSummaries="$current_term_sales_summaries" :lastTermSalesSummaries="$last_term_sales_summaries" :term="$term" :term="$term" />
        <x-client-management.client-detail.overview :client="$client" />
        <x-client-management.client-detail.base-info :client="$client" />
        <x-client-management.client-detail.sales-chart />
    </div>
</x-app-layout>
<!-- プロフィール画像変更モーダル -->
<x-image-update-modal title="顧客画像更新" route="image_update.update" :updateId="$client->client_id" />
@vite(
        [
            'resources/js/client_management/client_detail/client_detail.js',
            'resources/js/client_management/client_detail/client_sales_chart.js',
            'resources/js/image_update.js',
            'resources/sass/profile/profile.scss',
        ]
    )