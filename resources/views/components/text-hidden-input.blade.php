@props([
    'id' => null,
    'name' => null,
    'value' => null
])

<input type="hidden" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
