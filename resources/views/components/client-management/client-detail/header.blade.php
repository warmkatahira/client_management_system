<div class="bg-white rounded-2xl shadow-md p-6 flex items-center space-x-6 col-span-6">
    <div class="w-20 h-10 flex items-center justify-center">
        <img src="{{ asset('storage/client_images/'.$client->client_image_file_name) }}" class="object-contain image_fade_in_modal_open">
    </div>
    <div>
        <p class="text-2xl font-bold text-gray-800">{{ $client->full_client_name }}</p>
        <p class="text-gray-500">顧客コード: {{ $client->client_code }}</p>
    </div>
</div>
<input type="hidden" id="client_id" value="{{ $client->client_id }}">