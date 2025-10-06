<x-app-layout>
    <x-button.page-back :url="session('back_url_2')" />
    <form method="POST" action="{{ route('client_update.basic_info') }}" id="client_update_form" class="mt-5">
        @csrf
        <div class="flex flex-col gap-3">
            <x-form.input type="tel" label="顧客コード" id="client_code" name="client_code" :value="$client->client_code" required="true" />
            <x-form.select label="会社種別" id="company_type_id" name="company_type_id" :items="$company_types" optionValue="company_type_id" optionText="company_type_name_text" :value="$client->company_type_id" />
            <x-form.input type="text" label="顧客名" id="client_name" name="client_name" :value="$client->client_name" required="true" />
            <x-form.input type="text" label="郵便番号" id="client_postal_code" name="client_postal_code" :value="$client->client_postal_code" />
            <x-form.select label="都道府県" id="prefecture_id" name="prefecture_id" :items="$prefectures" optionValue="prefecture_id" optionText="prefecture_name" :value="$client->prefecture_id" />
            <x-form.input type="text" label="住所" id="client_address" name="client_address" :value="$client->client_address" />
            <x-form.input type="tel" label="電話番号" id="client_tel" name="client_tel" :value="$client->client_tel" />
            <x-form.input type="text" label="代表取締役名" id="representative_name" name="representative_name" :value="$client->representative_name" required="true" />
        </div>
        <input type="hidden" name="client_id" value="{{ $client->client_id }}">
        <x-button.enter id="client_update_enter" label="更新" />
    </form>
</x-app-layout>
@vite(['resources/js/client_management/client_update/client_update.js'])