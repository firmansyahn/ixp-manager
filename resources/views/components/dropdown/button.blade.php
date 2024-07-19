@props([
    'href',
    'id',
    'toggle',
    'trigger' => 'hover',
    'type' => 'button',
])

@if(isset($href))
<a {{ $attributes->merge([
    'href' => $href,
    'class' => 'inline-flex items-center py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-pink-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700'
])
}}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge([
    'data-dropdown-toggle' => $toggle,
    'data-dropdown-trigger' => $trigger,
    'id' => $id,
    'type' => $type,
    'class' => 'inline-flex justify-between w-full items-center py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-pink-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700'
])
}}>
    {{ $slot }}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>
@endif
