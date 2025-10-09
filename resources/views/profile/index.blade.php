<x-app-layout>
    <div class="mt-5">
        <div class="flex flex-row items-end">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('storage/profile_images/' . $user->profile_image_file_name) }}" class="w-24 image_fade_in_modal_open">
                <button
                    type="button"
                    id="image_update_modal_open"
                    class="btn absolute top-[-6px] right-[-6px] bg-gray-600 text-white w-7 h-7 pt-0.5 rounded-full">
                    <i class="las la-camera text-lg"></i>
                </button>
            </div>
        </div>
        <div class="flex flex-col mt-5 gap-y-3">
            <x-form.p label="氏名" :value="$user->full_name" />
            <x-form.p label="メールアドレス" :value="$user->email" />
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-5">
            @csrf
            <button type="submit" class="btn bg-red-500 text-white w-56 p-3"><i class="las la-sign-out-alt la-lg mr-1"></i>ログアウト</button>
        </form>
    </div>
    <!-- プロフィール画像変更モーダル -->
    <x-image-update-modal title="プロフィール画像更新" route="profile_image_update.update" :updateId="Auth::user()->user_id" />
</x-app-layout>
@vite(['resources/js/image_update.js', 'resources/sass/profile/profile.scss'])