<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <x-menu.button route="user.index" title="ユーザー" content="ユーザーのステータス変更など" />
        <x-menu.button route="operation_log.index" title="操作ログ" content="操作ログの確認・ダウンロード" />
    </div>
</x-app-layout>