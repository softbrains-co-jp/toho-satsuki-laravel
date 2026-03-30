@props([
    'name' => 'date',
    'value' => '',
    'placeholder' => '',
    'is_error' => false,
])

<input
    x-data
    x-init="flatpickr($el, { dateFormat: 'Y/m/d', defaultDate: '{{ $value }}', allowInput: true })"
    type="text"
    name="{{ $name }}"
    @class([
        'tw:h-[22px] tw:px-[4px]',
        'tw:bg-white' => !$attributes->has('class') || !str_contains($attributes->get('class'), 'tw:bg-'),
        'tw:w-full' => !$attributes->has('class') || !str_contains($attributes->get('class'), 'tw:w-'),
        'tw:read-only:bg-gray-100',
        $attributes->get('class'),
        'tw:bg-red-100' => $is_error,
    ])
    {{ $attributes->except('class') }}
    placeholder="{{ $placeholder }}"
>
