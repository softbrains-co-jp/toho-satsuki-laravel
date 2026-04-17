
@props([
    'type' => 'button',
])
<x-button.button type="{{ $type }}" {{ $attributes->merge(['class' => 'tw:min-h-[30px] tw:w-full tw:bg-[#5e5e5e] tw:border-[3px] tw:border-white tw:font-bold tw:text-white tw:rounded-[7px]']) }}>{{ $slot }}</x-button.button>
