@extends('layouts.app')

@section('content')

    <div class="container container_auth">
        <div class="columns">
            <div class="column">
                <div class="card-login card-auth box">
                    <div class="card-auth__header">
                        <div class="card-auth__header__title has-text-centered">
                            <h1>{{ __('Reset Password') }}</h1>
                        </div>
                    </div>
                    <div class="card-body card-auth__body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="field">
                                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                <div class="control">
                                    <input id="email" type="email"
                                           class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                                           value="{{ $email ?? old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help is-danger" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <label for="password" class="label">{{ __('Password') }}</label>
                                <div class="control">
                                    <input id="password" type="password"
                                           class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help is-danger" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                                <div class="control">
                                    <input id="password-confirm" type="password"
                                           class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-info is-fullwidth has-text-weight-bold">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
