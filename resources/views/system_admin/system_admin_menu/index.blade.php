<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">
        @can('system_admin_check')
            <x-menu.button route="base.index" title="倉庫" content="倉庫の登録・更新" />
            <x-menu.button route="user.index" title="ユーザー" content="ユーザーのステータス変更など" />
            <x-menu.button route="operation_log.index" title="操作ログ" content="操作ログの確認・ダウンロード" />
        @endcan
    </div>
</x-app-layout>