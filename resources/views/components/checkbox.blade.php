@props([
    'value' => '1', // default value if none provided
    'name',
    'checked' => false
])

<input type="checkbox"
       name="{{ $name }}"
       value="{{ $value }}"
       {{ $checked ? 'checked' : '' }}
       {!! $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500']) !!}>
