@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'class' => 'rounded border-gray-300 text-indigo-600 focus:ring-indigo-500',
    ];
@endphp

<label class="inline-flex items-center gap-2 whitespace-nowrap text-sm text-gray-700">
    <input {{ $attributes($defaults) }}>
    {{ $label }}
</label>
