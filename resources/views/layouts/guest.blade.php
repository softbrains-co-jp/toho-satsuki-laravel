<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="tw:min-h-screen tw:bg-[#191970] tw:text-white tw:antialiased">
    <main class="tw:mx-auto tw:w-full tw:max-w-md">
        {{ $slot }}
    </main>
    @livewireScripts
    @stack('scripts')
</body>
</html>
