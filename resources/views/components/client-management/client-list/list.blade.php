<div class="disable_scrollbar flex flex-grow overflow-scroll">
    <div class="client_list bg-white overflow-x-auto overflow-y-auto border border-gray-600">
        <table class="text-xs">
            <thead>
                <tr class="text-left text-white bg-black whitespace-nowrap sticky top-0">
                    <th id="all_check" class="font-thin py-1 px-2"><i class="las la-check-square la-lg"></i></th>
                    <th class="font-thin py-1 px-2 text-center">操作</th>
                    <th class="font-thin py-1 px-2 text-center">有効/無効</th>
                    <th class="font-thin py-1 px-2 text-center">管轄倉庫</th>
                    <th class="font-thin py-1 px-2 text-center">業種名</th>
                    <th class="font-thin py-1 px-2 text-center">顧客コード</th>
                    <th class="font-thin py-1 px-2 text-center">顧客名</th>
                    <th class="font-thin py-1 px-2 text-center">顧客HP</th>
                    <th class="font-thin py-1 px-2 text-center">更新日時</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($clients as $client)
                    <tr class="text-left cursor-default whitespace-nowrap @if(!$client->is_active) bg-gray-300 @endif">
                        <td class="py-1 px-2 border">
                            <input type="checkbox" name="chk[]" value="{{ $client->client_id }}" form="operation_div_form">
                        </td>
                        <td class="py-1 px-2 border">
                            <div class="flex flex-row gap-5">
                                <a href="{{ route('client_list.index', ['client_id' => $client->client_id]) }}" class="btn bg-btn-enter text-white py-1 px-2">詳細</a>
                            </div>
                        </td>
                        <td class="py-1 px-2 border text-center">{{ $client->is_active_text }}</td>
                        <td class="py-1 px-2 border text-center">{{ $client->base->base_name }}</td>
                        <td class="py-1 px-2 border text-center">{{ $client->industry->industry_name }}</td>
                        <td class="py-1 px-2 border">{{ $client->client_code }}</td>
                        <td class="py-1 px-2 border">
                            <div class="flex flex-row gap-5 items-center">
                                <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="w-20 h-10 object-contain image_fade_in_modal_open">
                                <p>{{ $client->client_name }}</p>
                            </div>
                        </td>
                        <td class="py-1 px-2 border text-center">
                            @if($client->client_url)
                                <a href="{{ $client->client_url }}" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:underline">
                                    <i class="las la-globe-americas la-2x"></i>
                                </a>
                            @endif
                        </td>
                        <td class="py-1 px-2 border text-center">{{ CarbonImmutable::parse($client->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($client->updated_at)->diffForHumans().')' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>