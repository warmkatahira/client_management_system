<div class="bg-white rounded-2xl shadow-md pt-2 pb-6 px-6 flex flex-col col-span-6">
    <div class="flex flex-row">
        <div class="flex gap-2 text-xs text-gray-500 items-center">
            <img class="profile_image_normal flex-shrink-0 tippy_user_full_name image_fade_in_modal_open" src="{{ asset('storage/profile_images/'.$client->user->profile_image_file_name) }}" data-user-full-name="{{ $client->user->full_name }}">
            <span class="whitespace-nowrap text-xs">
                {{ CarbonImmutable::parse($client->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($client->updated_at)->diffForHumans().')' }}
            </dpan>
        </div>
        <div class="ml-auto">
            @if($client->client_url)
                <a href="{{ $client->client_url }}" target="_blank" rel="noopener noreferrer"
                    class="btn inline-flex items-center px-5 py-2.5 bg-theme-main text-white text-sm rounded-full shadow-md">
                    <i class="las la-external-link-alt la-lg mr-1"></i>
                    HPへ移動
                </a>
            @endif
        </div>
    </div>
    <div class="flex flex-row items-center gap-5">
        <div class="flex items-center justify-center bg-gray-100 p-3 rounded-xl">
            <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="w-20 h-16 object-contain image_fade_in_modal_open">
        </div>
        <div>
            <p class="text-2xl font-bold text-gray-800">{{ $client->full_client_name }}</p>
            <p class="text-gray-500">顧客コード: {{ $client->client_code }}</p>
        </div>
    </div>
    <div class="p-3">
        <div class="grid grid-cols-2 gap-5">
            <div>
                <span class="text-sm border-b-4 border-theme-main py-1">住所</span>
                <p class="ml-3 mt-2">〒{{ $client->client_postal_code }}</p>
                <p class="ml-3">
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($client->full_client_address) }}"
                        target="_blank"
                        class="link-btn">
                        {{ $client->full_client_address }}
                    </a>
                </p>
            </div>
            <div>
                <span class="text-sm border-b-4 border-theme-main py-1">電話番号</span>
                <p class="ml-3 mt-2">{{ $client->client_tel ?? '未登録' }}</p>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="client_id" value="{{ $client->client_id }}">