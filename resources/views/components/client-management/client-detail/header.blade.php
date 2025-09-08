<div class="bg-white rounded-2xl shadow-md pt-2 pb-6 px-6 flex flex-col col-span-6">
    <div class="flex gap-2 text-xs text-gray-500 items-center ml-auto">
        <img class="profile_image_normal flex-shrink-0 tippy_user_full_name image_fade_in_modal_open" src="{{ asset('storage/profile_images/'.$client->user->profile_image_file_name) }}" data-user-full-name="{{ $client->user->full_name }}">
        <span class="whitespace-nowrap text-xs">
            {{ CarbonImmutable::parse($client->updated_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss').' ('.CarbonImmutable::parse($client->updated_at)->diffForHumans().')' }}
        </dpan>
    </div>
    <div class="flex flex-row items-center gap-5">
        <div class="flex items-center justify-center">
            <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="w-20 h-16 object-contain image_fade_in_modal_open">
        </div>
        <div>
            <p class="text-2xl font-bold text-gray-800">{{ $client->full_client_name }}</p>
            <p class="text-gray-500">顧客コード: {{ $client->client_code }}</p>
        </div>
    </div>
</div>
<input type="hidden" id="client_id" value="{{ $client->client_id }}">