<x-app-layout>
    <div class="grid grid-cols-12 gap-3 mt-3">
        <x-dashboard.clients-count-chart-by-region />
        <x-dashboard.clients-count-chart-by-base />
        <x-dashboard.sales-rank-chart />
    </div>
</x-app-layout>
@vite(['resources/js/dashboard/chart.js'])