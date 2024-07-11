@props(['for'])

@error($for)
    <p {{ $attributes->merge([
            'class' => 'tw-text-red-500 tw-text-xs tw-italic tw-mt-2'
        ]) }}>
        {{ $message }}
    </p>
@enderror
