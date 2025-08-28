<x-app-layout>
    <div class="flex flex-row gap-3 mt-3">
        <x-dashboard.clients-count-chart-by-region />
        <x-dashboard.clients-count-chart-by-base />
    </div>
</x-app-layout>
@vite(['resources/js/dashboard/chart.js'])