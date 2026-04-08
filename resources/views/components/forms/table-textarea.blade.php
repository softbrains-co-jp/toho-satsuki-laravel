@props([
    'type' => 'text',
    'name' => '',
    'palceholder' => '',
    'errors',
])
<textarea type="{{ $type }}" name="{{ $name }}" {{ $attributes->merge([
    'class' => 'tw:h-[37px] tw:py-[2px] tw:leading-[13pt] tw:w-full tw:bg-white' . ($errors->has($name) ? ' tw:bg-red-100 ' : ''),
]) }} placeholder="{{ $palceholder }}">{{ $slot }}</textarea>
