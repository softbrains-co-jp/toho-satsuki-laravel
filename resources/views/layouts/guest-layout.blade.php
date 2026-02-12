<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="tw:min-h-screen tw:bg-[#191970] tw:text-white tw:antialiased">
    <main class="tw:mx-auto tw:min-h-screen tw:w-full tw:max-w-md">
        {{ $slot }}
    </main>
</body>
</html>
