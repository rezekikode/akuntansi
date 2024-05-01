@props([
    'value' => ''
])
<span {!! $attributes->merge(['class' => 'block w-full p-2']) !!}>{{ $value }}</span>