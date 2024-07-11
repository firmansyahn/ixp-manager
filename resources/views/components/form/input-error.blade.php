@props(['for'])

@if ($errors->get($for))
    <div class="tw-mt-2">
        @foreach ($errors->get($for) as $error)
            <span class="tw-text-red-500 tw-text-sm">{{ $error }}</span>
        @endforeach
    </div>
@endif