@props([
    'type' => 'button'
])
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'tw:min-h-[30px] tw:w-full tw:bg-[#ab1e2c] tw:border-[3px] tw:border-white tw:font-bold tw:text-white tw:rounded-[7px]']) }}>{{ $slot }}</button>
