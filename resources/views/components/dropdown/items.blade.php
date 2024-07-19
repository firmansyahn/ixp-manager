@props([
    'toggle',
])

<div {{ $attributes->merge([
    'id' => $toggle,
    'class' => 'z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700'
    ])
}}>
    {{-- Dropdown menu --}}
    {{ $slot }}
</div>