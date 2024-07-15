<x-layouts.guest>

    <x-slot:title>Login</x-slot:title>

    <x-partials.identity-biglogo />

    <div class="row">
        <div class="col-12">
            <div class="tw-w-full tw-max-w-sm tw-mx-auto">

                <x-partials.flash-bootstrap />

                <form method="POST" action="{{ route('login@login') }}"
                    class="tw-bg-white tw-shadow-md tw-rounded-xl tw-px-8 tw-pt-6 tw-pb-8 tw-mb-6">

                    @csrf
                    <div class="tw-mb-6">
                        <x-form.label for="username" value="Username" />
                        <x-form.input id="username" name="username" placeholder="Username" autofocus value="{{ old('username') }}" />
                        <x-form.input-error for="username" />
                    </div>

                    <div class="tw-mb-6">
                        <x-form.label for="password" value="Password" />
                        <x-form.input id="password" name="password" type="password" placeholder="Password" />
                        <x-form.input-error for="password"/>
                    </div>

                    <div class="tw-mb-6">
                        <label class="tw-block tw-text-grey-dark">
                            <input class="tw-mr-2 tw-leading-tight" type="checkbox" name="remember" id="remember-me" value="1">
                            <span class="tw-font-light">
                                Remember me
                            </span>
                        </label>
                    </div>

                    <div class="tw-flex tw-items-center tw-justify-between">
                        <a href="{{ route('forgot-password@show-form') }}"
                            class="tw-font-normal">
                            Forgot password?
                        </a>

                        <button id="login-btn" class="btn btn-primary tw-rounded-lg" type="submit">
                            Sign In
                        </button>
                    </div>

                    @if( config('auth.peeringdb.enabled') )
                        <hr class="tw-my-4">
                        <p class="tw-text-center tw-text-lg tw-italic tw-text-grey-dark">or login with</p>
                        <p class="tw-text-center">
                            <a href="{{ route('auth:login-peeringdb') }}">
                                <img class="tw-inline" width="60%" src="{{ asset('images/pdb-logo-coloured.png') }}">
                            </a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>

</x-layouts.guest>