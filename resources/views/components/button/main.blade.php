@props([
    'href',
    'type' => 'button',
])

@if(isset($href))
<a {{ $attributes->merge([
        'href' => $href,
        'class' => 'tw-inline-flex tw-items-center tw-justify-center tw-px-2 sm:tw-px-3 tw-py-2 sm:tw-w-auto tw-text-center tw-rounded-lg'
    ])
}}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge([
        'type' => $type,
        'class' => 'inline-flex items-center justify-center px-2 sm:px-3 py-2 sm:w-auto text-center rounded-lg'
    ])
}}>
{{ $slot }}
</button>
@endif