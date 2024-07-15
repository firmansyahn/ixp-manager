<x-layouts.guest>

    <x-slot:title>Reset Password</x-slot:title>

    <x-partials.identity-biglogo />

    <div class="row">
         <div class="col-12">
             <div class="tw-w-full tw-max-w-sm tw-mx-auto">

                <x-partials.flash-bootstrap />

                <form method="POST" action="{{ route('reset-password@reset') }}"
                    class="tw-bg-white tw-shadow-md tw-rounded-xl tw-px-8 tw-pt-6 tw-pb-8 tw-mb-6">

                    @csrf

                    <p class="tw-mb-6">
                        Please enter your username, the token that was emailed to you and a new password below.
                    </p>

                    <div class="tw-mb-6">
                        <x-form.label for="username" value="Username" />
                        <x-form.input id="username" name="username" placeholder="Username" autofocus value="{{ $username ? $username : old('username') }}" />
                        <x-form.input-error for="username" />
                    </div>

                    <div class="tw-mb-6">
                        <x-form.label for="token" value="Token" />
                        <x-form.input id="token" name="token" value="{{ $token ? $token : old('token') }}" />
                        <x-form.input-error for="token"/>
                    </div>

                    <div class="tw-mb-6">
                        <x-form.label for="password" value="New Password" />
                        <x-form.input id="password" name="password" type="password" autofocus placeholder="New Password" />
                        <x-form.input-error for="password"/>
                    </div>

                    <div class="tw-mb-6">
                        <x-form.label for="password_confirmation" value="Confirm New Password" />
                        <x-form.input id="password_confirmation" name="password_confirmation" type="password" autofocus placeholder="Confirm New Password" />
                        <x-form.input-error for="password_confirmation"/>
                    </div>

                    <div class="tw-flex tw-items-center tw-justify-between">
                        <a href="{{ route('login@login') }}">
                            Return to Login
                        </a>
                        <button class="btn btn-primary" type="submit">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.guest>