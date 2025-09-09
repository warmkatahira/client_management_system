<div class="disable_scrollbar flex flex-grow overflow-scroll">
    <div class="item_category_list bg-white overflow-x-auto overflow-y-auto border border-gray-600">
        <table class="text-xs">
            <thead class="bg-black">
                <tr class="text-white bg-black whitespace-nowrap sticky top-0">
                    <th class="font-thin py-1 px-2 text-center">操作</th>
                    <th class="font-thin py-1 px-2 text-center">取扱品目名(大)</th>
                    <th class="font-thin py-1 px-2 text-center">顧客数</th>
                    <th class="font-thin py-1 px-2 text-center">取扱品目(小)設定数</th>
                    <th class="font-thin py-1 px-2 text-center">並び順</th>
                    <th class="font-thin py-1 px-2 text-center">最終更新</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($itemCategories as $item_category)
                    <tr class="text-left cursor-default whitespace-nowrap">
                        <td class="py-1 px-2 border">
                            <div class="flex flex-row gap-5">
                                <button type="button" class="btn toggle_detail_btn bg-btn-enter text-white py-1 px-2"><i class="las la-plus"></i></button>
                                <a href="{{ route('client_detail.index', ['item_category_id' => $item_category->item_category_id]) }}" class="btn bg-btn-enter text-white py-1 px-2">詳細</a>
                            </div>
                        </td>
                        <td class="py-1 px-2 border">{{ $item_category->item_category_name }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($item_category->clients_count) }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($item_category->item_sub_categories_count) }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($item_category->sort_order) }}</td>
                        <td class="py-1 px-2 border text-center">
                            <div class="flex items-center justify-center gap-2">
                                <img class="profile_image_normal flex-shrink-0 tippy_user_full_name image_fade_in_modal_open" src="{{ asset('storage/profile_images/'.$item_category->user->profile_image_file_name) }}" data-user-full-name="{{ $item_category->user->full_name }}">
                                <span class="whitespace-nowrap text-xs">
                                    {{ CarbonImmutable::parse($item_category->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($item_category->updated_at)->diffForHumans().')' }}
                                </dpan>
                            </div>
                        </td>
                    </tr>
                    <tr class="toggle_detail hidden">
                        <td colspan="6" class="p-0">
                            <table class="w-full text-xs border-t border-gray-300">
                                <thead>
                                    <tr class="text-white bg-black">
                                        <th class="font-thin py-1 px-2 text-center">取扱品目名(小)</th>
                                        <th class="font-thin py-1 px-2 text-center">顧客数</th>
                                        <th class="font-thin py-1 px-2 text-center">並び順</th>
                                        <th class="font-thin py-1 px-2 text-center">最終更新</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-teal-100">
                                    @foreach($item_category->item_sub_categories as $item_sub_category)
                                        <tr>
                                            <td class="py-1 px-2 border-b border-black">{{ $item_sub_category->item_sub_category_name }}</td>
                                            <td class="py-1 px-2 border-x border-b border-black text-right">{{ number_format($item_sub_category->base_clients_count) }}</td>
                                            <td class="py-1 px-2 border-x border-b border-black text-right">{{ number_format($item_sub_category->sort_order) }}</td>
                                            <td class="py-1 px-2 border-b border-black">
                                                <div class="flex items-center justify-center gap-2">
                                                    <img class="profile_image_normal flex-shrink-0 tippy_user_full_name image_fade_in_modal_open" src="{{ asset('storage/profile_images/'.$item_sub_category->user->profile_image_file_name) }}" data-user-full-name="{{ $item_category->user->full_name }}">
                                                    <span class="whitespace-nowrap text-xs">
                                                        {{ CarbonImmutable::parse($item_sub_category->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($item_sub_category->updated_at)->diffForHumans().')' }}
                                                    </dpan>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>