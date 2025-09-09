<div class="disable_scrollbar flex flex-grow overflow-scroll">
    <div class="client_list bg-white overflow-x-auto overflow-y-auto border border-gray-600">
        <table class="text-xs">
            <thead class="sticky top-0 z-[41] bg-black">
                <tr class="text-white bg-black whitespace-nowrap">
                    <th id="all_check" class="font-thin py-1 px-2"><i class="las la-check-square la-lg"></i></th>
                    <th class="font-thin py-1 px-2 text-center">操作</th>
                    <th class="font-thin py-1 px-2 text-center">取引中/停止</th>
                    <th class="font-thin py-1 px-2 text-center sticky left-0 z-[41] bg-black">顧客名</th>
                    <th class="font-thin py-1 px-2 text-center">管轄倉庫名</th>
                    <th class="font-thin py-1 px-2 text-center">取扱品目名(大)</th>
                    <th class="font-thin py-1 px-2 text-center">提供内容</th>
                    <th class="font-thin py-1 px-2 text-center">業種名</th>
                    <th class="font-thin py-1 px-2 text-center">回収期間</th>
                    <th class="font-thin py-1 px-2 text-center">取引種別名</th>
                    <th class="font-thin py-1 px-2 text-center">顧客コード</th>
                    <th class="font-thin py-1 px-2 text-center">都道府県</th>
                    <th class="font-thin py-1 px-2 text-center">代表取締役名</th>
                    <th class="font-thin py-1 px-2 text-center">顧客HP</th>
                    <th class="font-thin py-1 px-2 text-center">最終更新</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($clients as $client)
                    <tr class="group text-left cursor-default whitespace-nowrap @if(!$client->is_active) bg-gray-300 @endif">
                        <td class="py-1 px-2 border">
                            <input type="checkbox" name="chk[]" value="{{ $client->client_id }}" form="operation_div_form">
                        </td>
                        <td class="py-1 px-2 border">
                            <div class="flex flex-row gap-5">
                                <a href="{{ route('client_detail.index', ['client_id' => $client->client_id]) }}" class="btn bg-btn-enter text-white py-1 px-2">詳細</a>
                            </div>
                        </td>
                        <td class="py-1 px-2 border text-center">{{ $client->is_active_text }}</td>
                        <td class="py-1 px-2 border sticky left-0 z-[40] {{ $client->is_active ? 'bg-white' : 'bg-gray-300' }} group-hover:bg-slate-200">
                            <div class="flex flex-row gap-5 items-center">
                                <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="w-20 h-10 object-contain flex-shrink-0 image_fade_in_modal_open">
                                <p>{{ $client->full_client_name }}</p>
                            </div>
                        </td>
                        <td class="py-1 px-2 border">{{ $client->bases->pluck('base_name')->implode(' / ') }}</td>
                        <td class="py-1 px-2 border">
                            {{
                                $client->base_clients
                                    ->flatMap(fn($base_client) => $base_client->item_sub_categories->pluck('item_category.item_category_name'))
                                    ->unique()
                                    ->implode(' / ')
                            }}
                        </td>
                        <td class="py-1 px-2 border">
                            {{
                                $client->base_clients
                                    ->flatMap(fn($base_client) => $base_client->services)
                                    ->pluck('service_name')
                                    ->unique()
                                    ->implode(' / ')
                            }}
                        </td>
                        <td class="py-1 px-2 border text-center">{{ $client->industry->industry_name }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($client->collection_term->collection_term) }}日</td>
                        <td class="py-1 px-2 border text-center">{{ $client->account_type->account_type_name }}</td>
                        <td class="py-1 px-2 border">{{ $client->client_code }}</td>
                        <td class="py-1 px-2 border text-center">{{ $client->prefecture->prefecture_name }}</td>
                        <td class="py-1 px-2 border text-center">{{ $client->representative_name }}</td>
                        <td class="py-1 px-2 border text-center">
                            @if($client->client_url)
                                <a href="{{ $client->client_url }}" target="_blank" rel="noopener noreferrer" class="link-btn">
                                    <i class="las la-external-link-alt la-2x"></i>
                                </a>
                            @endif
                        </td>
                        <td class="py-1 px-2 border text-center">
                            <div class="flex items-center justify-center gap-2">
                                <img class="profile_image_normal flex-shrink-0 tippy_user_full_name image_fade_in_modal_open" src="{{ asset('storage/profile_images/'.$client->user->profile_image_file_name) }}" data-user-full-name="{{ $client->user->full_name }}">
                                <span class="whitespace-nowrap text-xs">
                                    {{ CarbonImmutable::parse($client->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($client->updated_at)->diffForHumans().')' }}
                                </dpan>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>