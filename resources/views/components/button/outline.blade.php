<x-button.main {{ $attributes->merge([
    'class' => 'tw-border-2 tw-border-gray-500'
])
}}>
{{ $value ?? $slot }}
</x-button.main>