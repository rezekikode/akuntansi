@props([
    'fieldValue' => '',
    'options' => [],
    'optionValue' => '',
    'optionLabel' => '',
    'disabled' => false,
    'invalid' => ''
])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm' . $invalid]) !!}>
    <option value="">-SELECT-</option>
    @foreach ($options as $option)
    <option value="{{ $option->$optionValue }}" {{ $fieldValue == $option->$optionValue ? 'selected' : '' }}>{{ $option->$optionValue }} - {{ $option->$optionLabel }}</option>
    @endforeach
</select>