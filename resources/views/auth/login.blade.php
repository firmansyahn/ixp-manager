@extends('layouts.app')

@section('title', 'Login')

@section('page-header-preamble')
    Login to {{ config( "identity.sitename" ) }} 
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @php
        // use IXP\Utils\View\Alert;
        // $t->alerts();
        @endphp

        <div class="tw-text-center tw-my-6">
            @if(config("identity.biglogo"))
                <img class="tw-inline img-fluid" src="{{ config( "identity.biglogo" ) }}" />
            @else
                <h2>
                    [Your Logo Here]
                </h2>
                <div>
                    Configure <code>IDENTITY_BIGLOGO</code> in <code>.env</code>.
                </div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="tw-w-full tw-max-w-sm tw-mx-auto">
            <form method="POST" action="{{ route('login@login') }}"
                class="tw-bg-white tw-shadow-md tw-rounded-xl tw-px-8 tw-pt-6 tw-pb-8 tw-mb-6">
            @csrf

                <div class="tw-mb-6">
                    <label class="tw-font-normal" for="username">
                        Username
                    </label>
                    <input name="username" class="form-control" id="username" type="text" placeholder="Username" autofocus value="{{ old('username') }}">
                    @foreach( $errors->get('username') as $err )
                        <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-2">{{ ee($err) }}</p>
                    @endforeach
                </div>

                <div class="tw-mb-6">
                    <label class="tw-font-normal" for="password">
                        Password
                    </label>
                    <input name="password" class="form-control" id="password" type="password" placeholder="...">
                    @foreach( $errors->get('password') as $err )
                        <p class="tw-text-red-500 tw-text-xs tw-italic tw-mt-2">{{ ee($err) }}</p>
                    @endforeach
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
                    <a href="{{ route( "forgot-password@show-form" ) }}"
                        class="tw-font-normal">
                        Forgot Password?
                    </a>

                    <button id="login-btn" class="btn btn-primary tw-rounded-lg" type="submit">
                        Sign In
                    </button>
                </div>

                @if(config('auth.peeringdb.enabled'))
                <hr class="tw-my-4">
                <p class="tw-text-center tw-text-lg tw-italic tw-text-grey-dark">or login with</p>
                <p class="tw-text-center">
                    <a href="{{ route('auth:login-peeringdb') }}">
                        <img class="tw-inline" width="60%" src="{{ asset( 'images/pdb-logo-coloured.png' ) }}">
                    </a>
                </p>
                @endif
            </form>
        </div>
    </div>
</div>

@endsection