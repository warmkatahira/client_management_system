<div class="bg-white rounded-2xl shadow-md p-6 col-start-1 col-span-6">
    <p class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-1"><i class="las la-building la-lg"></i></span>顧客情報
    </p>
    <div class="grid grid-cols-2 gap-6 text-gray-700">
        <div>
            <p class="text-sm text-gray-500"><i class="las la-map-marked-alt la-lg mr-1"></i>住所</p>
            <p class="ml-3">〒{{ $client->client_postal_code }}</p>
            <p class="ml-3">
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($client->full_client_address) }}"
                    target="_blank"
                    class="link-btn">
                    {{ $client->full_client_address }}
                </a>
            </p>
        </div>
        <div>
            <p class="text-sm text-gray-500"><i class="las la-phone la-lg mr-1"></i>電話番号</p>
            <p class="ml-3">{{ $client->client_tel ?? '未登録' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500"><i class="las la-link la-lg mr-1"></i>HP</p>
            <p class="ml-3">
                @if($client->client_url)
                    <a href="{{ $client->client_url }}" target="_blank" rel="noopener noreferrer"
                        class="btn inline-flex items-center px-5 py-2.5 bg-theme-main text-white text-sm rounded-full shadow-md">
                        <i class="las la-external-link-alt la-lg mr-1"></i>
                        HPへ移動
                    </a>
                @else
                    未登録
                @endif
            </p>
        </div>
    </div>
</div>