@extends('layouts.app')

@section('content')

    <section class="section py-0 is-flex is-flex-1">
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
                            @if (session('status'))
                                <div class="notification-list">
                                    <div class="notification is-success">
                                        <div class="notification__icon">
                                            <img src="{{ asset('/svg/icons/notification/ic_thankyou.svg') }}"
                                                 class="svg"
                                                 alt="">
                                        </div>
                                        <div class="notification__content-wrap">
                                            <h5 class="notification__title has-text-weight-bold">
                                                {{ session('status') }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="field">
                                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                    <div class="control">
                                        <input id="email" type="email"
                                               class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                                               value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help is-danger" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="field">
                                    <div class="control">
                                        <button type="submit"
                                                class="button is-info is-fullwidth has-text-weight-bold h-3">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="has-text-centered">
                                    <a class="has-text-info is-link" href="{{ route('login') }}">
                                        Вспомнили пароль?
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
