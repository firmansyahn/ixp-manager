@props([
    'href',
    'type' => 'button',
])

@if(isset($href))
<a {{ $attributes->merge([
    'href' => $href,
    'class' => 'block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white min-w-fit'
])
}}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white'
])
}}>
    {{ $slot }}
</button>
@endif
