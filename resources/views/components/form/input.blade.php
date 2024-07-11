@props([
    'disabled' => false,
    'type' => 'text',
])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'type' => $type,
    // 'class' => 'block w-full border rounded-lg focus:outline-none focus:ring-green-300 focus:border-green-300 dark:border-gray-600 p-2.5 text-sm sm:text-sm dark:bg-gray-700 dark:text-white dark:placeholder-gray-300'
    'class' => 'form-control'
    ])
!!}>
