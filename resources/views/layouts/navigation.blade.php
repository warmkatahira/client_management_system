<div id="navigation-bar">
    <!-- ロゴ -->
    <div class="navigation-btn">
        <a id="logo"><img src="{{ asset('image/navigation_logo.svg') }}"></a>
    </div>
    <!-- ダッシュボード -->
    <div class="navigation-btn">
        <a class="btn tippy_dashboard" href="{{ route('dashboard.index') }}"><i class="las la-home"></i></a>
    </div>
    <!-- 顧客管理 -->
    <div class="navigation-btn">
        <a class="btn tippy_client_management" href="{{ route('client_management_menu.index') }}"><i class="las la-users-cog"></i></a>
    </div>
    <!-- 設定 -->
    <div class="navigation-btn">
        <a class="btn tippy_setting" href="{{ route('setting_menu.index') }}"><i class="las la-cog"></i></a>
    </div>
    @can('system_admin_check')
        <!-- システム管理 -->
        <div class="navigation-btn">
            <a class="btn tippy_system_admin" href="{{ route('system_admin_menu.index') }}"><i class="las la-robot"></i></a>
        </div>
    @endcan
    <!-- プロフィール -->
    <div class="navigation-btn">
        <a class="btn tippy_profile" href="{{ route('profile.index') }}"><img id="profile" class="profile_image_navigation" src="{{ asset('storage/profile_images/' . Auth::user()->profile_image_file_name) }}"></a>
    </div>
</div>