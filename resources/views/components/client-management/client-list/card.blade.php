<div class="w-full grid grid-cols-12 gap-4">
    @foreach($clients as $client)
        <div class="col-span-3 border border-gray-300 rounded-2xl shadow-md p-4 flex flex-col items-center {{ $client->is_active ? 'bg-white' : 'bg-gray-300' }} transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
            <div class="flex items-center gap-2 mb-2 text-xs text-gray-500">
                <img class="profile_image_normal flex-shrink-0 tippy_user_full_name image_fade_in_modal_open" src="{{ asset('storage/profile_images/'.$client->user->profile_image_file_name) }}" data-user-full-name="{{ $client->user->full_name }}">
                <span class="whitespace-nowrap text-xs">
                    {{ CarbonImmutable::parse($client->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($client->updated_at)->diffForHumans().')' }}
                </dpan>
            </div>
            <div class="w-full h-40 flex justify-center items-center {{ $client->is_active ? 'bg-gray-100' : 'bg-gray-300' }} rounded-xl overflow-hidden">
                <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="w-40 h-28 object-contain image_fade_in_modal_open">
            </div>
            <p class="mt-3 text-base font-bold text-gray-800 text-center">{{ $client->client_name }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ $client->bases->pluck('short_base_name')->implode(' / ') }}</p>
            <p class="text-xs text-gray-500">
                {{ 
                    $client->base_clients
                            ->flatMap(fn($base_client) => $base_client->item_sub_categories->pluck('item_category.item_category_name'))
                            ->unique()
                            ->implode(' / ')
                }}
            </p>
            <div class="flex gap-5 mt-4">
                <a href="{{ route('client_detail.index', ['client_id' => $client->client_id]) }}" class="btn bg-theme-main text-white py-1 px-5 rounded-full">詳細</a>
                @if($client->client_url)
                    <a href="{{ $client->client_url }}" target="_blank" rel="noopener noreferrer" class="btn bg-theme-main text-white py-1 px-5 rounded-full">HP</a>
                @endif
            </div>
        </div>
    @endforeach
</div>