<div class="w-full grid grid-cols-12 gap-4">
    @foreach($clients as $client)
        <div class="col-span-3 border border-gray-300 rounded-2xl shadow p-4 flex flex-col items-center @if(!$client->is_active) bg-gray-300 @else bg-white  @endif">
            <div class="w-full h-40 flex justify-center items-center bg-gray-100 rounded-xl overflow-hidden">
                <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="w-40 h-28 object-contain image_fade_in_modal_open">
            </div>
            <p class="mt-3 text-base font-bold text-gray-800 text-center">{{ $client->client_name }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ $client->bases->pluck('short_base_name')->implode(' / ') }}</p>
            <p class="text-xs text-gray-500">{{ $client->client_items->pluck('client_item_name')->implode(' / ') }}</p>
            <div class="flex gap-5 mt-4">
                <a href="{{ route('client_detail.index', ['client_id' => $client->client_id]) }}" class="btn bg-btn-enter text-white py-1 px-5 rounded-xl">詳細</a>
                @if($client->client_url)
                    <a href="{{ $client->client_url }}" target="_blank" rel="noopener noreferrer" class="btn bg-btn-enter text-white py-1 px-5 rounded-xl">HP</a>
                @endif
            </div>
        </div>
    @endforeach
</div>