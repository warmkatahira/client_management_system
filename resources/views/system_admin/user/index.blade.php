<x-app-layout>
    <div class="flex flex-row my-3">
        <x-pagination :pages="$users" />
    </div>
    <div class="flex flex-row gap-x-5 items-start">
        <x-system-admin.user.search route="user.index" />
        <x-system-admin.user.list :users="$users" />
    </div>
</x-app-layout>