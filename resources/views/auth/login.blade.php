@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a href="#">Bulma</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Components</a></li>
                <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
            </ul>
        </nav>
    </div>
    <div class="container container_auth">
        <div class="columns">
            <div class="column">
                <div class="card-login card-auth box">
                    <div class="card-auth__header">
                        <div class="card-auth__header__title has-text-centered">
                            <h1>{{ __('Login') }}</h1>
                        </div>
                    </div>
                    <div class="card-body card-auth__body">
                        <form method="POST" action="{{ route('login') }}">
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

                            <div class="is-flex has-justify-content-between">
                                <div class="field">
                                    <div class="control">
                                        <label class="checkbox" for="remember">
                                            <input type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>{{ __('Remember Me') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="has-text-info is-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-info is-fullwidth has-text-weight-bold">
                                        {{ __('Login') }}
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
