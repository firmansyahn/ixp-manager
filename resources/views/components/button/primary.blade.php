@props([
    'href',
    'type' => 'button',
])

@if(isset($href))
<a {{ $attributes->merge([
        'href' => $href,
        'class' => 'inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-green-500 border hover:bg-green-700 dark:text-slate-300 focus:ring-2 focus:ring-green-200 dark:text-blue-400 dark:bg-slate-800 dark:border-slate-700 dark:hover:text-blue-400 dark:hover:bg-slate-700'
    ])
}}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge([
        'type' => $type,
        'class' => 'tw-inline-flex tw-items-center tw-justify-center tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-center tw-text-white tw-rounded-lg tw-bg-green-500 tw-border hover:bg-green-700 focus:ring-1 focus:ring-green-200 hover:ring-1 dark:text-blue-400 dark:bg-slate-800 dark:border-slate-700 dark:hover:text-blue-400 dark:hover:bg-slate-700 dark:hover:ring-white'
    ])
}}>
{{ $slot }}
</button>
@endif