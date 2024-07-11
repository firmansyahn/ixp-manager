<x-layouts.guest>

    <x-slot:title>Forget Password</x-slot:title>

    <x-partials.identity-biglogo />

    <div class="row">
        <div class="col-12">
            <div class="tw-w-full tw-max-w-sm tw-mx-auto">

                <form method="POST" action="{{ route('forgot-password@reset-email') }}"
                    class="tw-bg-white tw-shadow-md tw-rounded-sm tw-px-8 tw-pt-6 tw-pb-8 tw-mb-6">

                    @csrf

                    <p class="tw-mb-6 tw-text-grey-dark tw-font-bold">
                        Please enter your username and we will send you a password reset token by email.
                    </p>

                    <div class="tw-mb-16">
                        <label class="control-label" for="username">
                            Username
                        </label>
                        <input name="username" class="form-control" id="username" type="text" placeholder="Username" autofocus 
                            value="{{ old('username') }}">
                        @foreach( $errors->get( 'username' ) as $err )
                            <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-2">
                                {{ $err }}
                            </p>
                        @endforeach
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