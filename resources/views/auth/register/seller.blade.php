@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container">
        <div class="register-container">
            <div class="columns">
                <div class="column">
                    <div class="card-register card-register_seller card-auth">
                        <div class="card-auth__header">
                            <div class="card-auth__header__title has-text-left">
                                <h1>Регистрация продавца</h1>
                            </div>
                        </div>
                        <div class="card-body card-auth__body">
                            <form method="POST" action="#">
                                <div class="columns is-multiline">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label for="name"
                                                   class="label label_req"><span>Ваше имя</span></label>
                                            <div class="control">
                                                <input type="text"
                                                       class="input is-size-875" name="name"
                                                       value="" placeholder="Введите Ваше имя" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label for="name"
                                                   class="label label_req"><span>Ваша фамилия</span></label>
                                            <div class="control">
                                                <input type="text"
                                                       class="input is-size-875" name="surname"
                                                       value="" placeholder="Введите Вашу фамилию" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label for="email"
                                                   class="label label_req"><span>Контактный email</span></label>
                                            <div class="control">
                                                <input id="email" type="email"
                                                       class="input is-size-875" name="email"
                                                       value="" placeholder="Введите email" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">

                                    </div>
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">
                                                <label class="checkbox is-warning" for="remember">
                                                    <input type="checkbox" name="remember"
                                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span>С <a href="#" class="has-text-info is-link">условиями предоставления услуг</a> ознакомлен</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">
                                                <button type="submit"
                                                        class="button is-warning is-fullwidth has-text-weight-bold">
                                                    Подтвердить регистрацию продаца
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="column is-two-fifths register-column-info-wrap">
                    <div class="register-column-info register-column-info_seller">
                        <div class="register-column-info__title has-text-weight-bold">Комфортные инструменты для продажи</div>
                        <div class="register-column-info__desc">
                            Мы подобрали для вас лучшие инструменты, которые помогут продать ваш бизнес максимально
                            комофртно. Более 12 инструментов от лидеров индустрии, которые помогают предпренимателям
                            получать максимум.
                        </div>
                        <figure class="register-column-info__img">
                            <img src="{{ asset('/svg/people/people-1.svg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
