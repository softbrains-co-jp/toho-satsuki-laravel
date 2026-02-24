
@props([
    'type' => 'button',
])
<x-button.button type="{{ $type }}" {{ $attributes->merge(['class' => 'tw:min-h-[30px] tw:w-full tw:bg-[#e5e5e5] tw:border-[3px] tw:border-white tw:font-bold tw:text-[#666666] tw:rounded-[7px]']) }}>{{ $slot }}</x-button.button>
