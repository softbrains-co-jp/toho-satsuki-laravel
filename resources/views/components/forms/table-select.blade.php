@props([
    'name' => '',
    'value' => '',
    'empty' => '',
    'options' => [],
    'is_error' => false,
])
<select name="{{ $name }}" {{ $attributes->merge([
    'class' => 'tw:select tw:h-[22px] tw:w-full tw:!border-0 tw:bg-white tw:!w-auto tw:!pl-[5px] tw:!rounded-none' . ($is_error ? ' tw:bg-red-100 ' : ''),
]) }} >
    @if ($empty)
        <option value="">{{ $empty }}</option>
    @endif
    @foreach ($options as $key => $item)
        <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>{{$item}}</option>
    @endforeach
</select>
