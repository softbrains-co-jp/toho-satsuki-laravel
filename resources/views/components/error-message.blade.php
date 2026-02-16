@props([
    'name' => null,
])

@php
    $messages = $name ? $errors->get($name) : [];
@endphp

@if (!empty($messages))
    <x-alert type="error">
        <ul {{ $attributes->merge() }}>
            @foreach ($messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
