@props(['value'])

<label {{ $attributes->merge(['class' => 'tw-block tw-font-medium tw-text-sm tw-mb-1']) }}>
    {{ $value ?? $slot }}
</label>
