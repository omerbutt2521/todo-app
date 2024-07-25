@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
