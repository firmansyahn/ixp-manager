@props([
    'alert',
    'title' => '[Your Logo Here]',
    'description' => 'Configure <code>IDENTITY_BIGLOGO</code> in <code>.env</code>.',
])

<div class="row">
    <div class="col-12">

        {{ $slot }}

        <div class="tw-text-center tw-my-6">
            @if( config("identity.biglogo") )
                <img class="tw-inline img-fluid" src="{{ config("identity.biglogo") }}" />
            @else
                <h2>
                    {{ $title }}
                </h2>
                <div>
                    {{ $description }}
                </div>
            @endif
        </div>
    </div>
</div>