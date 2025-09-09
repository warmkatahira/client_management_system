<div class="disable_scrollbar flex flex-grow overflow-scroll">
    <div class="item_category_list bg-white overflow-x-auto overflow-y-auto border border-gray-600">
        <table class="text-xs">
            <thead class="bg-black">
                <tr class="text-white bg-black whitespace-nowrap sticky top-0">
                    <th class="font-thin py-1 px-2 text-center">操作</th>
                    <th class="font-thin py-1 px-2 text-center">提供内容名</th>
                    <th class="font-thin py-1 px-2 text-center">顧客数</th>
                    <th class="font-thin py-1 px-2 text-center">並び順</th>
                    <th class="font-thin py-1 px-2 text-center">最終更新</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($services as $service)
                    <tr class="text-left cursor-default whitespace-nowrap">
                        <td class="py-1 px-2 border">
                            <div class="flex flex-row gap-5">
                                <a class="btn bg-btn-enter text-white py-1 px-2">詳細</a>
                            </div>
                        </td>
                        <td class="py-1 px-2 border">{{ $service->service_name }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($service->clients_count) }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($service->sort_order) }}</td>
                        <td class="py-1 px-2 border text-center">
                            <div class="flex items-center justify-center gap-2">
                                <span class="whitespace-nowrap text-xs">
                                    {{ CarbonImmutable::parse($service->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($service->updated_at)->diffForHumans().')' }}
                                </dpan>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>