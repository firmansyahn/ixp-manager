<x-layouts.guest>

    <x-slot:title>Forgot Username</x-slot:title>

    <x-partials.identity-biglogo />

    <div class="row">
        <div class="col-12">
            <div class="tw-w-full tw-max-w-sm tw-mx-auto">

                <x-partials.flash-bootstrap />

                <form method="POST" action="{{ route('forgot-password@username-email') }}"
                    class="tw-bg-white tw-shadow-md tw-rounded-sm tw-px-8 tw-pt-6 tw-pb-8 tw-mb-6">

                    @csrf

                    <p class="tw-mb-6">
                        Please enter your email address and we will send you any related username(s) by email.
                    </p>

                    <div class="tw-mb-16">
                        <x-form.label for="email" value="Email" />
                        <x-form.input id="email" name="email" placeholder="username@example.com" autofocus value="{{ old('email') }}" />
                        <x-form.input-error for="email" />
                    </div>

                    <div class="tw-flex tw-items-center tw-justify-between">
                        <a href="{{ route('forgot-password@show-form') }}">
                            Forgot password?
                        </a>

                        {{-- <x-button.primary type="submit">
                            Submit
                        </x-button.primary> --}}


                        <a class="btn btn-white" href="{{ route('login@login' ) }}">
                            Cancel
                        </a>

                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>
