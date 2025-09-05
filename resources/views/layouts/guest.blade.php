<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">

        <!-- Styles -->
        @vite([
            'resources/css/app.css',
            'resources/sass/theme.scss',
            'resources/sass/loading.scss',
            'resources/sass/common.scss',
            'resources/sass/welcome.scss',
        ])

        <!-- Scripts -->
        @vite([
            'resources/js/app.js',
            'resources/js/loading.js',
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
        <div id="animated-background" class="bg-gradient-to-r from-pink-100 via-purple-100 to-blue-100 min-h-screen w-full flex flex-col items-center justify-center py-5">
            <div class="bg-white bg-opacity-80 rounded-3xl shadow-xl p-10 max-w-md w-full">
                <!-- アラート表示 -->
                <x-alert/>
                <!-- ローディング -->
                <x-loading />
                <div class="text-center">
                    <a href="{{ route('welcome.index') }}">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <p class="text-gray-600 mb-1 text-3xl mt-5">顧客管理システム</p>
                    <p class="text-gray-600 mb-3 text-xl merienda">
                        <span class="text-theme-main text-3xl">C</span>lient 
                        <span class="text-theme-main text-3xl">M</span>anagement 
                        <span class="text-theme-main text-3xl">S</span>ystem
                    </p>
                </div>
                <div class="w-full px-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
