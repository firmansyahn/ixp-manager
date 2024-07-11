<x-layouts.guest>

    <x-slot:title>Forgot Password</x-slot:title>

    <x-partials.identity-biglogo />

    <div class="row">
        <div class="col-12">
            <div class="tw-w-full tw-max-w-sm tw-mx-auto">

                <form method="POST" action="{{ route('forgot-password@reset-email') }}"
                    class="tw-bg-white tw-shadow-md tw-rounded-sm tw-px-8 tw-pt-6 tw-pb-8 tw-mb-6">

                    @csrf

                    <p class="tw-mb-6">
                        Please enter your username and we will send you a password reset token by email.
                    </p>

                    <div class="tw-mb-16">
                        <x-form.label for="username" value="Username" />
                        <x-form.input id="username" name="username" placeholder="Username" autofocus value="{{ old('username') }}" />
                        <x-form.input-error for="username" />
                    </div>

                    <div class="tw-flex tw-items-center tw-justify-between">
                        <a href="{{ route( "forgot-password@showUsernameForm") }}">
                            Forgot Username?
                        </a>

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