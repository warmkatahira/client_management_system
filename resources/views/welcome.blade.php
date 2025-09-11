<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">

        <!-- Styles -->
        @vite([
            'resources/css/app.css',
            'resources/sass/theme.scss',
            'resources/sass/common.scss',
            'resources/sass/welcome.scss',
        ])

        <!-- Scripts -->
        @vite([
            'resources/js/app.js',
            'resources/js/welcome.js',
        ])

        <!-- LINE AWESOME -->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Oleo+Script:wght@400;700&family=Zen+Maru+Gothic&family=Merienda&display=swap" rel="stylesheet">

        <!-- Lordicon -->
        <script src="https://cdn.lordicon.com/pzdvqjsp.js"></script>

        <!-- toastr.js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Tippy.js -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
    </head>
    <body class="min-h-screen flex items-center justify-center">
        <!-- アラート表示 -->
        <x-alert/>
        <div id="animated-background" class="bg-gradient-to-r from-pink-100 via-purple-100 to-blue-100 min-h-screen w-full flex flex-col items-center justify-center">
            <div class="bg-white bg-opacity-80 rounded-3xl shadow-xl p-12 text-center max-w-md w-full">
                <img src="{{ asset('image/warm_logo.svg') }}" class="welcome_logo mb-5">
                <p class="text-gray-600 mb-1 text-3xl">顧客管理システム</p>
                <p class="text-gray-600 mb-8 text-xl merienda">
                    <span class="text-theme-main text-3xl">C</span>lient 
                    <span class="text-theme-main text-3xl">M</span>anagement 
                    <span class="text-theme-main text-3xl">S</span>ystem
                </p>
                <div class="flex flex-col gap-5">
                    <a href="{{ route('login') }}" class="btn bg-theme-pink text-white py-3 rounded-lg">ログイン</a>
                    <a href="{{ route('register') }}" class="btn bg-theme-purple text-white py-3 rounded-lg">ユーザー登録</a>
                </div>
            </div>
            @php
                $imagePath = storage_path('app/public/client_images');
                $images = [];
                if(File::exists($imagePath)){
                    $images = File::files($imagePath);
                    // no_image.png を除外
                    $images = array_filter($images, function($image) {
                        return $image->getFilename() !== 'no_image.png';
                    });
                }
            @endphp
            <div class="logo-slider-wrapper overflow-hidden w-full py-10">
                <div class="logo-slider flex flex-row">
                    @foreach($images as $image)
                        <img src="{{ asset('storage/client_images/' . $image->getFilename()) }}" class="logo-item w-28 h-20 object-contain mx-5">
                    @endforeach
                    {{-- 複製して無限ループ --}}
                    @foreach($images as $image)
                        <img src="{{ asset('storage/client_images/' . $image->getFilename()) }}" class="logo-item w-28 h-20 object-contain mx-5">
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>