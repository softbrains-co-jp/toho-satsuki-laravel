<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Satsuki') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="tw:min-h-screen tw:bg-[#c3cbe1] tw:text-white tw:antialiased">
    <header class="tw:h-[75px] tw:bg-[#191970]">
        <div class="tw:w-screen tw:h-full tw:py-[10px]">
            <div class="tw:w-[1200px] tw:mx-auto tw:flex tw:justify-between tw:items-center">
                <div><img src="/images/h_logo.png" /></div>
                <div>
                    <div class="tw:flex tw:gap-x-4">
                        <div>
                            <span class="tw:px-3 tw:py-1 tw:bg-[#323280] tw:rounded-full tw:font-bold">日付</span>
                            {{ now()->format('Y-m-d')}}
                        </div>
                        <div>
                            <span class="tw:px-3 tw:py-1 tw:bg-[#323280] tw:rounded-full tw:font-bold">ユーザID</span>
                            {{ auth()->id() }}
                        </div>
                        <div>
                            <span class="tw:px-3 tw:py-1 tw:bg-[#323280] tw:rounded-full tw:font-bold">ユーザ名</span>
                            {{ auth()->user()?->name }}
                        </div>
                        <div>
                            <span class="tw:px-3 tw:py-1 tw:bg-[#323280] tw:rounded-full tw:font-bold">回線依頼番号</span>
                            {{ auth()->user()?->name }}
                        </div>
                    </div>
                    <div class="tw:pt-2 tw:text-right tw:font-bold">
                        <a href="{{ route('logout') }}" class="tw:pr-3">ログアウト</a>/ 工事日程調整 / 業務支援 / パスワードの変更 / クエリ作成機能 / 工事進捗
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="tw:w-screen tw:h-[calc(100vh-95px)] tw:relative">
        <x-toastr-notifications />
        {{ $slot }}
    </main>
    <footer class="tw:h-[20px]">
        <div class="tw:w-screen tw:py-[1px] tw:bg-[#191970] tw:text-[0.9rem] tw:text-center">
            Copyright (c) 2014. All rights reserved by TOHO ELECTRICAL CONSTRUCTION CO.,LTD.
        </div>
    </footer>
    @livewireScripts
    @stack('scripts')
</body>
</html>
